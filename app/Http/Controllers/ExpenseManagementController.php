<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseManagement;
use App\Models\User;
use App\Models\ExpPurpose;
use Illuminate\Support\Facades\Auth;

class ExpenseManagementController extends Controller
{
    public function index()
    {

        $expenses = ExpenseManagement::all()->where('created_by', Auth::user()->id);

        return view('admin.hrm.expense.manage_expense', compact('expenses'));
    }

    public function expCategoryAdd()
    {
        return view('admin.hrm.expense.expensePurposeAdd');
    }

    public function expCatStore(Request $request)
    {
        // return ($request->all());

        $expcats = new ExpPurpose;
        $expcats->created_by = Auth::user()->id;
        $expcats->exp_name = $request->exp_name;
        $expcats->save();

        if (!empty($expcats)) {

            return redirect('/hrm/expense/category/list')->with('message', 'Add successfully.');
        }
        return redirect('/hrm/expense/category/list')->with('exception', 'Operation failed !');
    }

    public function expCategoryList()
    {
        $expcats = ExpPurpose::all()->where('created_by', Auth::user()->id);

        return view('admin.hrm.expense.managePurposeExpense', ['expcats' => $expcats]);
    }

    public function expCategoryEdit($id)
    {
        $expcats = ExpPurpose::all()->where('id', $id);

        return view('admin.hrm.expense.expensePurposeEdit', ['expcats' => $expcats]);
    }

    public function expCatUpdate(Request $request)
    {
        // return ($request->all());
        $expcats = ExpPurpose::find($request->id);
        $expcats->exp_name = $request->exp_name;
        $expcats->save();

        if (!empty($expcats)) {

            return redirect('/hrm/expense/category/list')->with('message', 'Update successfully.');
        }
        return redirect('/hrm/expense/category/list')->with('exception', 'Operation failed !');
    }

    public function create()
    {
        $employees = User::whereBetween('access_label', [2, 3])
            ->where('deletion_status', 0)
            ->select('id', 'name')
            ->orderBy('id', 'DESC')
            ->get()
            ->toArray();
        return view('admin.hrm.expense.add_expense', compact('employees'));
    }

    public function store(Request $request)
    {

        $expenses = new ExpenseManagement();
        $expenses->created_by = Auth::user()->id;
        $expenses->purchased_date = $request->expense_date;
        $expenses->amount_spent = $request->exp_amount;
        $expenses->purchased_from = $request->cheque_no;
        $expenses->purchased_details = $request->particular;
        $expenses->employee_id = $request->employee_id;
        $expenses->item_name = $request->exp_purpose;
        $expenses->deletion_status = $request->deletion_status;
        $expenses->save();



        if (!empty($expenses)) {
            return redirect('/hrm/expense/manage-expense')->with('message', 'Add successfully.');
        }
        return redirect('/hrm/expense/manage-expense')->with('exception', 'Operation failed !');
    }

    public function ExpensePayslip($id)
    {
        return view('admin.hrm.expense.ExpensePayslip', compact('id'));
    }

    public function show(ExpenseManagement $expenseManagement)
    {
        //
    }

    public function edit(ExpenseManagement $expenseManagement)
    {
        //
    }

    public function update(Request $request, ExpenseManagement $expenseManagement) {
		//
	}

	public function destroy(ExpenseManagement $expenseManagement) {
		//
	}
}
