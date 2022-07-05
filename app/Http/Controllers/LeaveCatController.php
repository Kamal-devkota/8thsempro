<?php

namespace App\Http\Controllers;

use App\Models\LeaveCategory;
use Illuminate\Http\Request;

class LeaveCatController extends Controller
{
    public function index()
    {
        $leave_categories = LeaveCategory::query()
            ->leftjoin('users as users', 'users.id', '=', 'leave_categories.created_by')
            ->orderBy('leave_categories.leave_category', 'ASC')
            ->where('leave_categories.deletion_status', 0)
            ->get([
                'leave_categories.*',
                'users.name',
            ])
            ->toArray();
        return view('admin.leave.leave_category.manage_leave_categories', compact('leave_categories'));
    }

    public function create()
    {
        return view('admin.leave.leave_category.add_leave_category');
    }

    public function store(Request $request) {
        $leave_category = $this->validate(request(), [
            'leave_category' => 'required|unique:leave_categories|max:100',
            'publication_status' => 'required',
            'leave_category_description' => 'required',
        ]);

        $result = LeaveCategory::create($leave_category + ['created_by' => auth()->user()->id]);
        $inserted_id = $result->id;

        if (!empty($inserted_id)) {
            return redirect('/setting/leave_categories/create')->with('message', 'Add successfully.');
        }
        return redirect('/setting/leave_categories/create')->with('exception', 'Operation failed !');
    }

    public function published($id) {
        $affected_row = LeaveCategory::where('id', $id)
        ->update(['publication_status' => 1]);

        if (!empty($affected_row)) {
            return redirect('/setting/leave_categories')->with('message', 'Published successfully.');
        }
        return redirect('/setting/leave_categories')->with('exception', 'Operation failed !');
    }

    public function unpublished($id) {
        $affected_row = LeaveCategory::where('id', $id)
        ->update(['publication_status' => 0]);

        if (!empty($affected_row)) {
            return redirect('/setting/leave_categories')->with('message', 'Unpublished successfully.');
        }
        return redirect('/setting/leave_categories')->with('exception', 'Operation failed !');
    }

    public function show($id) {
        $leave_category = LeaveCategory::query()
        ->leftjoin('users as users','users.id', '=', 'leave_categories.created_by')
        ->orderBy('leave_categories.leave_category', 'ASC')
        ->where('leave_categories.id', $id)
        ->where('leave_categories.deletion_status', 0)
        ->first([
            'leave_categories.*',
            'users.name',
        ])
        ->toArray();
        return view('admin.leave.leave_category.show_leave_category', compact('leave_category'));
    }

    public function edit($id) {
        $leave_category = LeaveCategory::find($id)->toArray();
        return view('admin.leave.leave_category.edit_leave_category', compact('leave_category'));
    }

    public function update(Request $request, $id) {
        $leave_category = LeaveCategory::find($id);
        $this->validate(request(), [
            'leave_category' => 'required|max:100',
            'publication_status' => 'required',
            'leave_category_description' => 'required',
        ]);

        $leave_category->leave_category = $request->get('leave_category');
        $leave_category->leave_category_description = $request->get('leave_category_description');
        $leave_category->publication_status = $request->get('publication_status');
        $affected_row = $leave_category->save();

        if (!empty($affected_row)) {
            return redirect('/setting/leave_categories')->with('message', 'Update successfully.');
        }
        return redirect('/setting/leave_categories')->with('exception', 'Operation failed !');
    }

    public function destroy($id) {
        $affected_row = LeaveCategory::where('id', $id)
        ->update(['deletion_status' => 1]);

        if (!empty($affected_row)) {
            return redirect('/setting/leave_categories')->with('message', 'Delete successfully.');
        }
        return redirect('/setting/leave_categories')->with('exception', 'Operation failed !');
    }
}
