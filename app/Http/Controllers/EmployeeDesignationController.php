<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class EmployeeDesignationController extends Controller
{
    public function index() {
        $designations = Designation::query()
        ->leftjoin('departments as dept','dept.id', '=', 'designations.department_id')
        ->leftjoin('users as users','users.id', '=', 'designations.created_by')
        ->orderBy('designations.designation', 'ASC')
        ->where('designations.deletion_status', 0)
        ->get([
            'designations.*', 
            'dept.department',
            'users.name',
        ])
        ->toArray();

        return view('admin.setting.designation.index', compact('designations'));
    }

    public function create() {
        $departments = Department::all()
                ->sortByDesc('job_type')
                ->where('deletion_status', 0)
                ->toArray();
        return view('admin.setting.designation.add', compact('departments'));
    }

    public function store(Request $request) {
        $designation = $this->validate(request(), [
            'designation' => 'required|unique:designations|max:100',
            'department_id' => 'required',
            'publication_status' => 'required',
            'designation_description' => 'required',
        ],[
            'department_id.required' => 'The department field is required.',
        ]);

        $result = Designation::create($designation + ['created_by' => auth()->user()->id]);
        $inserted_id = $result->id;

        if (!empty($inserted_id)) {
            return redirect('/setting/designations/create')->with('message', 'Add successfully.');
        }
        return redirect('/setting/designations/create')->with('exception', 'Operation failed !');
    }

    public function published($id) {
        $affected_row = Designation::where('id', $id)
                ->update(['publication_status' => 1]);

        if (!empty($affected_row)) {
            return redirect('/setting/designations')->with('message', 'Published successfully.');
        }
        return redirect('/setting/designations')->with('exception', 'Operation failed !');
    }

    public function unpublished($id) {
        $affected_row = Designation::where('id', $id)
                ->update(['publication_status' => 0]);

        if (!empty($affected_row)) {
            return redirect('/setting/designations')->with('message', 'Unpublished successfully.');
        }
        return redirect('/setting/designations')->with('exception', 'Operation failed !');
    }

    public function show($id) {
        $designation = Designation::query()
        ->leftjoin('departments as dept','dept.id', '=', 'designations.department_id')
        ->leftjoin('users as users','users.id', '=', 'designations.created_by')
        ->orderBy('designations.designation', 'ASC')
        ->where('designations.id', $id)
        ->first([
            'designations.*', 
            'dept.department',
            'users.name',
        ])
        ->toArray();
        return view('admin.setting.designation.show', compact('designation'));
    }

    public function edit($id) {
        $designation = Designation::find($id)->toArray();
        $departments = Department::all()
                ->sortByDesc('job_type')
                ->where('deletion_status', 0)
                ->toArray();
        return view('admin.setting.designation.edit', compact('designation', 'departments'));
    }

    public function update(Request $request, $id) {
        $designation = Designation::find($id);
        $this->validate(request(), [
            'designation' => 'required|max:100',
            'department_id' => 'required',
            'publication_status' => 'required',
            'designation_description' => 'required',
        ],[
            'department_id.required' => 'The department field is required.',
        ]);

        $designation->designation = $request->get('designation');
        $designation->department_id = $request->get('department_id');
        $designation->designation_description = $request->get('designation_description');
        $designation->publication_status = $request->get('publication_status');
        $affected_row = $designation->save();

        if (!empty($affected_row)) {
            return redirect('/setting/designations')->with('message', 'Update successfully.');
        }
        return redirect('/setting/designations')->with('exception', 'Operation failed !');
    }

    public function destroy($id) {
        $affected_row = Designation::where('id', $id)
                ->update(['deletion_status' => 1]);

        if (!empty($affected_row)) {
            return redirect('/setting/designations')->with('message', 'Delete successfully.');
        }
        return redirect('/setting/designations')->with('exception', 'Operation failed !');
    }
}
