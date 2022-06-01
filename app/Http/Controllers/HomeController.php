<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
use Carbon\Carbon;
use App\Models\PersonalEvent;

class HomeController extends Controller
{

    public function __construct() {
		$this->middleware('auth');
	}

    
    public function index()
    {
        $today = Carbon::now();
		$date_today = $today->toDateString();

        $personal_events = PersonalEvent::query()
			->leftjoin('users as users', 'users.id', '=', 'personal_events.created_by')
			->orderBy('personal_events.start_date', 'ASC')
			->where('personal_events.deletion_status', 0)
			->where('personal_events.start_date', '>=', $date_today)
			->get([
				'personal_events.*',
				'users.name',
			]);

		$clients = User::where('access_label', 5)
			->where('deletion_status', 0)
			->get();

		$references = User::where('access_label', 4)
			->where('deletion_status', 0)
			->get();

		$employees = User::where('access_label', '>=', 2)
			->where('access_label', '<=', 3)
			->where('deletion_status', 0)
			->get();

		$files = File::where('deletion_status', 0)
			->get();

            return view('admin.dashboard', compact('clients', 'references', 'employees', 'personal_events', 'files'));
    }
}
