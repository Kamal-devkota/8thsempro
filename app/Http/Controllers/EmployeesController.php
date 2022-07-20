<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index()
    {

        $employees = User::query()
            ->join('designations', 'users.designation_id', '=', 'designations.id')
            ->whereBetween('users.access_label', [2, 3])
            ->where('users.deletion_status', 0)
            ->select('employee_id', 'users.id', 'users.name', 'users.contact_no_one', 'users.created_at', 'users.activation_status', 'designations.designation')
            ->orderBy('users.employee_id', 'ASC')
            ->get()
            ->toArray();
        return view('admin.employee.index', compact('employees'));
    }


    public function create()
    {
        $designations = Designation::where('deletion_status', 0)
            ->where('publication_status', 1)
            ->orderBy('designation', 'ASC')
            ->select('id', 'designation')
            ->get()
            ->toArray();
        $roles = Role::all();

        return view('admin.employee.add', compact('designations', 'roles'));
    }

    public function store(Request $request)
    {
        $employee = request()->validate([
            'employee_id' => 'required|max:250',
            'name' => 'required|max:100',
            'father_name' => 'nullable|max:100',
            'mother_name' => 'nullable|max:100',
            'spouse_name' => 'nullable|max:100',
            'email' => 'required|email|unique:users|max:100',
            'contact_no_one' => 'required|max:20',
            'emergency_contact' => 'nullable|max:20',
            'gender' => 'required',
            'date_of_birth' => 'nullable|date',
            'present_address' => 'required|max:250',
            'permanent_address' => 'nullable|max:250',
            'home_district' => 'nullable|max:250',
            'academic_qualification' => 'nullable',
            'professional_qualification' => 'nullable',
            'experience' => 'nullable',
            'joining_date' => 'nullable',
            'designation_id' => 'required|numeric',
            'joining_position' => 'required|numeric',
            'marital_status' => 'nullable',
            'id_name' => 'nullable',
            'id_number' => 'nullable|max:100',
        ], [
            'designation_id.required' => 'The designation field is required.',
            'contact_no_one.required' => 'The contact no field is required.',
            'web.regex' => 'The URL format is invalid.',
            'name.regex' => 'No number is allowed.',
            'access_label' => 'The position field is required.',
        ]);

        $result = User::create($employee + ['created_by' => auth()->user()->id, 'access_label' => 2, 'password' => bcrypt(12345678)]);
        $inserted_id = $result->id;

        if (!empty($inserted_id)) {
            return redirect('/employees/create')->with('message', 'Add successfully.');
        }
        return redirect('/employees/create')->with('exception', 'Operation failed !');
    }

    public function active($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/employees')->with('message', 'Activate successfully.');
		}
		return redirect('/employees')->with('exception', 'Operation failed !');
	}

    public function deactive($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 0]);

		if (!empty($affected_row)) {
			return redirect('/employees')->with('message', 'Deactive successfully.');
		}
		return redirect('/employees')->with('exception', 'Operation failed !');
	}

    public function show($id) {
		$employee = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();
		$created_by = User::where('id', $employee->created_by)
			->select('id', 'name')
			->first();
		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();
		$departments = Department::where('deletion_status', 0)
			->select('id', 'department')
			->get();	
		return view('admin.employee.show', compact('employee', 'created_by', 'designations', 'departments'));
	}

    public function edit($id) {
		$employee = User::find($id);
		$designations = Designation::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('designation', 'ASC')
			->select('id', 'designation')
			->get()
			->toArray();
		$roles = Role::all();
		$userRole = $employee->roles->pluck('name', 'name')->all();
		return view('admin.employee.edit', compact('employee', 'roles', 'designations','userRole'));
	}

    public function update(Request $request, $id) {
		$employee = User::find($id);

		request()->validate([
			'employee_id' => 'required|max:250',
			'name' => 'required|max:100',
			'father_name' => 'nullable|max:100',
			'mother_name' => 'nullable|max:100',
			'spouse_name' => 'nullable|max:100',
			'email' => 'required|email|max:100',
			'contact_no_one' => 'required|max:20',
			'emergency_contact' => 'nullable|max:20',
			'gender' => 'required',
			'date_of_birth' => 'nullable|date',
			'present_address' => 'required|max:250',
			'permanent_address' => 'nullable|max:250',
			'home_district' => 'nullable|max:250',
			'academic_qualification' => 'nullable',
			'professional_qualification' => 'nullable',
			'experience' => 'nullable',
			'joining_date' => 'nullable',
			'designation_id' => 'required|numeric',
			'joining_position' => 'required|numeric',
			'marital_status' => 'nullable',
			'id_name' => 'nullable',
			'id_number' => 'nullable|max:100',
			'role' => 'required',
		], [
			'designation_id.required' => 'The designation field is required.',
			'contact_no_one.required' => 'The contact no field is required.',
			'web.regex' => 'The URL format is invalid.',
			'name.regex' => 'No number is allowed.',
			'access_label' => 'The position field is required.',
		]);

		$employee->employee_id = $request->get('employee_id');
		$employee->name = $request->get('name');
		$employee->father_name = $request->get('father_name');
		$employee->mother_name = $request->get('mother_name');
		$employee->spouse_name = $request->get('spouse_name');
		$employee->email = $request->get('email');
		$employee->contact_no_one = $request->get('contact_no_one');
		$employee->emergency_contact = $request->get('emergency_contact');
		$employee->gender = $request->get('gender');
		$employee->date_of_birth = $request->get('date_of_birth');
		$employee->present_address = $request->get('present_address');
		$employee->permanent_address = $request->get('permanent_address');
		$employee->home_district = $request->get('home_district');
		$employee->academic_qualification = $request->get('academic_qualification');
		$employee->professional_qualification = $request->get('professional_qualification');
		$employee->experience = $request->get('experience');
		$employee->joining_date = $request->get('joining_date');
		$employee->designation_id = $request->get('designation_id');
		$employee->joining_position = $request->get('joining_position');
		$employee->access_label = 2;
		$employee->marital_status = $request->get('marital_status');
		$employee->id_name = $request->get('id_name');
		$employee->id_number = $request->get('id_number');
		$employee->role = $request->get('role');
		$affected_row = $employee->save();

		DB::table('model_has_roles')->where('model_id', $id)->delete();
        $employee->assignRole($request->input('role'));

		if (!empty($affected_row)) {
			return redirect('/employees')->with('message', 'Update successfully.');
		}
		return redirect('/employees')->with('exception', 'Operation failed !');
	}

	public function print() {
		$employees = User::query()
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->whereBetween('users.access_label', [2, 3])
			->where('users.deletion_status', 0)
			->select('users.id', 'users.employee_id', 'users.name', 'users.email', 'users.present_address', 'users.contact_no_one', 'designations.designation')
			->orderBy('users.id', 'DESC')
			->get()
			->toArray();
		return view('admin.employee.print', compact('employees'));
	}

	public function pdf($id) {
		$employee = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();

		$created_by = User::where('id', $employee->created_by)
			->select('id', 'name')
			->first();

		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();

		$pdf = PDF::loadView('admin.employee.pdf', compact('employee', 'created_by', 'designations'));
		$file_name = 'EMP-' . $employee->id . '.pdf';
		return $pdf->download($file_name);
	}

    public function destroy($id) {
		$affected_row = User::where('id', $id)
			->update(['deletion_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/employees')->with('message', 'Delete successfully.');
		}
		return redirect('/employees')->with('exception', 'Operation failed !');
	}

    
}
