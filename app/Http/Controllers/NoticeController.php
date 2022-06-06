<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index() {
		$notices = Notice::query()
			->leftjoin('users as users', 'users.id', '=', 'notices.created_by')
			->orderBy('notices.id', 'DESC')
			->where('notices.deletion_status', 0)
			->get([
				'notices.*',
				'users.name',
			])
			->toArray();
		
		return view('admin.hrm.notice.index', compact('notices'));
	}

    public function create() {
		return view('admin.hrm.notice.add');
	}

	public function store(Request $request) {
		$notice = $this->validate($request, [
			'notice_title' => 'required',
			'description' => 'required',
			'publication_status' => 'required',
		]);
		$result = Notice::create($notice + ['created_by' => auth()->user()->id]);
		$inserted_id = $result->id;
		if (!empty($inserted_id)) {
			return redirect('/hrm/notice/create')->with('message', 'Add successfully.');
		}
		return redirect('/hrm/notice/create')->with('exception', 'Operation failed !');

	}

	public function published($id) {
		$affected_row = Notice::where('id', $id)
			->update(['publication_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/hrm/notice/')->with('message', 'Published successfully.');
		}
		return redirect('/hrm/notice/')->with('exception', 'Operation failed !');
	}

	public function unpublished($id) {
		$affected_row = Notice::where('id', $id)
			->update(['publication_status' => 0]);

		if (!empty($affected_row)) {
			return redirect('/hrm/notice/')->with('message', 'Unpublished successfully.');
		}
		return redirect('/hrm/notice/')->with('exception', 'Operation failed !');
	}

	public function show() {
		$notices = Notice::query()
		->leftjoin('users as users', 'users.id', '=', 'notices.created_by')
		->where('notices.deletion_status', 0)
		->where('notices.publication_status', 1)
		->orderBy('notices.id', 'DESC')
		->paginate(5);
		return view('admin.hrm.notice.show', compact('notices'));
	}

	public function edit(Notice $notice) {
		//
	}

	public function update(Request $request, Notice $notice) {
		//
	}

	public function destroy($id) {
		$affected_row = Notice::where('id', $id)
			->update(['deletion_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/hrm/notice/')->with('message', 'Delete successfully.');
		}
		return redirect('/hrm/notice/')->with('exception', 'Operation failed !');
	}
}
