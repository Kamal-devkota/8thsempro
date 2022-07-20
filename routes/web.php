<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');

    // Employees routes 
	Route::get('/employees', 'EmployeesController@index');
	Route::get('/employees/print', 'EmployeesController@print');
	Route::get('/employees/create', 'EmployeesController@create');
	Route::post('/employees/store', 'EmployeesController@store')->name('employee.add');
	Route::get('/employees/active/{id}', 'EmployeesController@active');
	Route::get('/employees/deactive/{id}', 'EmployeesController@deactive');
	Route::get('/employees/details/{id}', 'EmployeesController@show');
	Route::get('/employees/download-pdf/{id}', 'EmployeesController@pdf');
	Route::get('/employees/edit/{id}', 'EmployeesController@edit');
	Route::post('/employees/update/{id}', 'EmployeesController@update');
	Route::get('/employees/delete/{id}', 'EmployeesController@destroy');

    // Designation routes
	Route::get('/setting/designations', 'EmployeeDesignationController@index');
	Route::get('/setting/designations/create', 'EmployeeDesignationController@create');
	Route::post('/setting/designations/store', 'EmployeeDesignationController@store');
	Route::get('/setting/designations/published/{id}', 'EmployeeDesignationController@published');
	Route::get('/setting/designations/unpublished/{id}', 'EmployeeDesignationController@unpublished');
	Route::get('/setting/designations/details/{id}', 'EmployeeDesignationController@show');
	Route::get('/setting/designations/edit/{id}', 'EmployeeDesignationController@edit');
	Route::post('/setting/designations/update/{id}', 'EmployeeDesignationController@update');
	Route::get('/setting/designations/delete/{id}', 'EmployeeDesignationController@destroy');

    // Department routes
	Route::get('/setting/departments', 'EmployeeDepartmentController@index');
	Route::get('/setting/departments/create', 'EmployeeDepartmentController@create');
	Route::post('/setting/departments/store', 'EmployeeDepartmentController@store');
	Route::get('/setting/departments/published/{id}', 'EmployeeDepartmentController@published');
	Route::get('/setting/departments/unpublished/{id}', 'EmployeeDepartmentController@unpublished');
	Route::get('/setting/departments/details/{id}', 'EmployeeDepartmentController@show');
	Route::get('/setting/departments/edit/{id}', 'EmployeeDepartmentController@edit');
	Route::post('/setting/departments/update/{id}', 'EmployeeDepartmentController@update');
	Route::get('/setting/departments/delete/{id}', 'EmployeeDepartmentController@destroy');

	/**
	 * HRM routes
	 */

    //notice routes
	Route::get('/hrm/notice', 'NoticeController@index');
	Route::get('/hrm/notice/create', 'NoticeController@create');
	Route::post('/hrm/notice/store', 'NoticeController@store');
	Route::get('/hrm/notice/published/{id}', 'NoticeController@published');
	Route::get('/hrm/notice/unpublished/{id}', 'NoticeController@unpublished');
	Route::get('/hrm/notice/delete/{id}', 'NoticeController@destroy');
	Route::get('/hrm/notice/show', 'NoticeController@show');

	// Payroll Section
	Route::get('/hrm/payroll', 'PayrollController@index');
	Route::post('/hrm/payroll/go', 'PayrollController@go');
	Route::get('/hrm/payroll/manage-salary/{id}', 'PayrollController@create');
	Route::post('/hrm/payroll/store', 'PayrollController@store');
	Route::get('/hrm/payroll/salary-list', 'PayrollController@list');
	Route::get('/hrm/payroll/details/{id}', 'PayrollController@show');
	Route::post('/hrm/payroll/update/{id}', 'PayrollController@update');

	//Increment
	Route::get('/hrm/payroll/increment/search', 'IncrementController@newIncrementSearch');
	Route::post('/hrm/payroll/increment/store', 'IncrementController@newIncrementStore');
	Route::get('/hrm/payroll/increment/list', 'IncrementController@incrementList');

	//Salary Statement
	Route::get('/hrm/salary/statement/search', 'IncrementController@salaryStatementSearch');
	Route::get('/hrm/salary/statement/view', 'IncrementController@salaryStatementView');
	Route::get('/hrm/salary/statement/preview', 'IncrementController@salaryStatementPreview');
	Route::get('/hrm/salary/statement/pdf', 'IncrementController@salaryStatementPdf');

	// Bonus Section 
	Route::get('/hrm/bonuses', 'BonusController@index');
	Route::get('/hrm/bonuses/create', 'BonusController@create');
	Route::post('/hrm/bonuses/store', 'BonusController@store');
	Route::get('/hrm/bonuses/details/{id}', 'BonusController@show');
	Route::get('/hrm/bonuses/edit/{id}', 'BonusController@edit');
	Route::post('/hrm/bonuses/update/{id}', 'BonusController@update');
	Route::get('/hrm/bonuses/delete/{id}', 'BonusController@destroy');

	// Deduction Section 
	Route::get('/hrm/deductions', 'DeductionController@index');
	Route::get('/hrm/deductions/create', 'DeductionController@create');
	Route::post('/hrm/deductions/store', 'DeductionController@store');
	Route::get('/hrm/deductions/details/{id}', 'DeductionController@show');
	Route::get('/hrm/deductions/edit/{id}', 'DeductionController@edit');
	Route::post('/hrm/deductions/update/{id}', 'DeductionController@update');
	Route::get('/hrm/deductions/delete/{id}', 'DeductionController@destroy');

	// Loan Section 
	Route::get('/hrm/loans', 'LoanController@index');
	Route::get('/hrm/loans/create', 'LoanController@create');
	Route::post('/hrm/loans/store', 'LoanController@store');
	Route::get('/hrm/loans/details/{id}', 'LoanController@show');
	Route::get('/hrm/loans/edit/{id}', 'LoanController@edit');
	Route::post('/hrm/loans/update/{id}', 'LoanController@update');
	Route::get('/hrm/loans/delete/{id}', 'LoanController@destroy');

	// Payment Section
	Route::get('/hrm/salary-payments', 'SalaryPaymentController@index');
	Route::post('/hrm/salary-payments/go', 'SalaryPaymentController@go');
	Route::get('/hrm/salary-payments/manage-salary/{id}/{salary_month}', 'SalaryPaymentController@create');
	Route::get('/hrm/salary-payments/pdf/{id}/{salary_month}', 'SalaryPaymentController@pdf');
	Route::post('/hrm/salary-payments/store', 'SalaryPaymentController@store');

	// Generate Payslip
	Route::get('/hrm/generate-payslips/', 'SalaryPaymentController@show');
	Route::post('/hrm/generate-payslips/', 'SalaryPaymentController@generate');
	Route::get('/hrm/generate-payslips/salary-list/{salary_month}', 'SalaryPaymentController@list');
	
	// Provident fund
	Route::get('/hrm/provident-funds/', 'SalaryPaymentController@provident_fund');

	//Salary Sheet
	Route::get('/hrm/salary/sheet/search', 'SalaryPaymentController@salarySheetSearch');
	Route::post('/hrm/salary/sheet/view', 'SalaryPaymentController@salarySheetView');


	// Customer Section 
	Route::get('/clients', 'CustomerController@index');
	Route::get('/clients/print', 'CustomerController@print');
	Route::get('/clients/clients-pdf', 'CustomerController@clients_pdf');
	Route::get('/clients/create', 'CustomerController@create');
	Route::post('/clients/store', 'CustomerController@store');
	Route::get('/clients/active/{id}', 'CustomerController@active');
	Route::get('/clients/deactive/{id}', 'CustomerController@deactive');
	Route::get('/clients/details/{id}', 'CustomerController@show');
	Route::get('/clients/download-pdf/{id}', 'CustomerController@pdf');
	Route::get('/clients/edit/{id}', 'CustomerController@edit');
	Route::post('/clients/update/{id}', 'CustomerController@update');
	Route::get('/clients/delete/{id}', 'CustomerController@destroy');
	
	// Customer Types Section //
	Route::get('/setting/client-types', 'CustomerTypeController@index');
	Route::get('/setting/client-types/create', 'CustomerTypeController@create');
	Route::post('/setting/client-types/store', 'CustomerTypeController@store');
	Route::get('/setting/client-types/published/{id}', 'CustomerTypeController@published');
	Route::get('/setting/client-types/unpublished/{id}', 'CustomerTypeController@unpublished');
	Route::get('/setting/client-types/details/{id}', 'CustomerTypeController@show');
	Route::get('/setting/client-types/edit/{id}', 'CustomerTypeController@edit');
	Route::post('/setting/client-types/update/{id}', 'CustomerTypeController@update');
	Route::get('/setting/client-types/delete/{id}', 'CustomerTypeController@destroy');


	//working days
	Route::get('/setting/working-days', 'WorkingDayController@index');
	Route::post('/setting/working-days/update/', 'WorkingDayController@update');

	//Holidays list
	Route::get('/setting/holidays', 'HolidayController@index');
	Route::get('/setting/holidays/create', 'HolidayController@create');
	Route::post('/setting/holidays/store', 'HolidayController@store');
	Route::get('/setting/holidays/published/{id}', 'HolidayController@published');
	Route::get('/setting/holidays/unpublished/{id}', 'HolidayController@unpublished');
	Route::get('/setting/holidays/details/{id}', 'HolidayController@show');
	Route::get('/setting/holidays/edit/{id}', 'HolidayController@edit');
	Route::post('/setting/holidays/update/{id}', 'HolidayController@update');
	Route::get('/setting/holidays/delete/{id}', 'HolidayController@destroy');

	// Personal Event Section //
	Route::get('/setting/personal-events', 'PersonalEventController@index');
	Route::get('/setting/personal-events/create', 'PersonalEventController@create');
	Route::post('/setting/personal-events/store', 'PersonalEventController@store');
	Route::get('/setting/personal-events/published/{id}', 'PersonalEventController@published');
	Route::get('/setting/personal-events/unpublished/{id}', 'PersonalEventController@unpublished');
	Route::get('/setting/personal-events/details/{id}', 'PersonalEventController@show');
	Route::get('/setting/personal-events/edit/{id}', 'PersonalEventController@edit');
	Route::post('/setting/personal-events/update/{id}', 'PersonalEventController@update');
	Route::get('/setting/personal-events/delete/{id}', 'PersonalEventController@destroy');
	

	//expense managements
	Route::get('/hrm/expense/category/add', 'ExpenseManagementController@expCategoryAdd');
	Route::get('/hrm/expense/category/edit/{id}', 'ExpenseManagementController@expCategoryEdit');
	Route::post('/hrm/expense/category/update', 'ExpenseManagementController@expCatUpdate');

	Route::post('/hrm/expense/category/store', 'ExpenseManagementController@expCatStore');
	Route::get('/hrm/expense/category/list', 'ExpenseManagementController@expCategoryList');
	Route::get('/hrm/expense/manage-expense', 'ExpenseManagementController@index');
	Route::get('/hrm/expense/add-expense', 'ExpenseManagementController@create');
	Route::post('/hrm/expense/store', 'ExpenseManagementController@store');
	Route::get('/hrm/expense/payslip/{id}', 'ExpenseManagementController@ExpensePayslip');

	//employee award Category
	Route::get('/setting/award_categories', 'AwardCategoryController@index');
	Route::get('/setting/award_categories/create', 'AwardCategoryController@create');
	Route::post('/setting/award_categories/store', 'AwardCategoryController@store');
	Route::get('/setting/award_categories/published/{id}', 'AwardCategoryController@published');
	Route::get('/setting/award_categories/unpublished/{id}', 'AwardCategoryController@unpublished');
	Route::get('/setting/award_categories/edit/{id}', 'AwardCategoryController@edit');
	Route::post('/setting/award_categories/update/{id}', 'AwardCategoryController@update');
	Route::get('/setting/award_categories/delete/{id}', 'AwardCategoryController@destroy');

	//employee award
	Route::get('/hrm/employee-awards', 'EmployeeAwardController@index');
	Route::get('/hrm/employee-awards/create', 'EmployeeAwardController@create');
	Route::post('/hrm/employee-awards/store', 'EmployeeAwardController@store');
	Route::get('/hrm/employee-awards/published/{id}', 'EmployeeAwardController@published');
	Route::get('/hrm/employee-awards/unpublished/{id}', 'EmployeeAwardController@unpublished');
	Route::get('/hrm/employee-awards/edit/{id}', 'EmployeeAwardController@edit');
	Route::post('/hrm/employee-awards/update/{id}', 'EmployeeAwardController@update');
	Route::get('/hrm/employee-awards/details/{id}', 'EmployeeAwardController@show');
	Route::get('/hrm/employee-awards/delete/{id}', 'EmployeeAwardController@destroy');


	/**
	 * Leave Routes
	 */

	 // Leave Category Section 
	Route::get('/setting/leave_categories', 'LeaveCatController@index');
	Route::get('/setting/leave_categories/create', 'LeaveCatController@create');
	Route::post('/setting/leave_categories/store', 'LeaveCatController@store');
	Route::get('/setting/leave_categories/published/{id}', 'LeaveCatController@published');
	Route::get('/setting/leave_categories/unpublished/{id}', 'LeaveCatController@unpublished');
	Route::get('/setting/leave_categories/details/{id}', 'LeaveCatController@show');
	Route::get('/setting/leave_categories/edit/{id}', 'LeaveCatController@edit');
	Route::post('/setting/leave_categories/update/{id}', 'LeaveCatController@update');
	Route::get('/setting/leave_categories/delete/{id}', 'LeaveCatController@destroy');
	
	//Application Listes
	Route::get('/hrm/application_lists', 'LeaveAppController@apllicationLists');
	Route::get('/hrm/leave_application/approved/{id}', 'LeaveAppController@approved');
	Route::get('/hrm/leave_application/not_approved/{id}', 'LeaveAppController@not_approved');
	Route::get('/hrm/application_lists/{id}', 'LeaveAppController@show');
	Route::get('/hrm/application/download/{id}', 'LeaveAppController@applicationDownload');

	//Leave Application
	Route::get('/hrm/leave_application', 'LeaveAppController@index');
	Route::get('/hrm/leave_application/create', 'LeaveAppController@create');
	Route::post('/hrm/leave_application/store', 'LeaveAppController@store');
	Route::get('/hrm/leave_application/{id}', 'LeaveAppController@show');
	Route::get('/hrm/leave-reports', 'LeaveAppController@reports');
	Route::get('/hrm/leave-reports/pdf-reports', 'LeaveAppController@pdf_reports');

	// Experience ceritificate and Noc
	Route::get('/hrm/noc/add', 'LeaveAppController@nocAdd');
	Route::post('/hrm/noc/store', 'LeaveAppController@nocStore');
	Route::get('/hrm/noc/list', 'LeaveAppController@nocList');

	Route::get('/hrm/noc/generate/{id}', 'LeaveAppController@nocGenerate');
	Route::get('/hrm/certificate/generate/{id}', 'LeaveAppController@certificateGenerate');
	Route::get('/hrm/certificate/list', 'LeaveAppController@certificateList');

	// Profile Section
	Route::get('/profile/user-profile', 'ProfileController@index');
	Route::post('/profile/update-profile', 'ProfileController@update');
	Route::get('/profile/change-password', 'ProfileController@change_password');
	Route::post('/profile/update-password', 'ProfileController@update_password');

	//Attendance Section
	Route::get('/hrm/attendance/manage', 'AttendanceController@index');
	Route::post('/hrm/attendance/set', 'AttendanceController@set_attendance');
	Route::post('/hrm/attendance/store', 'AttendanceController@store');
	Route::post('/hrm/attendance/update', 'AttendanceController@update');
	Route::get('/hrm/attendance/report', 'AttendanceController@report');
	Route::post('/hrm/attendance/get-report', 'AttendanceController@get_report');
	Route::post('/hrm/attendance/time/set', 'AttendanceController@timeSet');
	Route::get('/hrm/attendance/details/{id}', 'AttendanceController@attDetails');
	Route::get('/hrm/attendance/details/report/go', 'AttendanceController@attDetailsReportGenerate');
	Route::get('/hrm/attendance/details/report/all', 'AttendanceController@attDetailsReport');
	Route::get('/hrm/attendance/details/report/pdf', 'AttendanceController@attDetailsReportPdf');

	// roles section
	Route::get('/admin/roles/index', 'RolesController@index');
	Route::get('/admin/roles/add', 'RolesController@add');
	Route::post('/admin/roles/store', 'RolesController@store');
	Route::get('/admin/roles/edit/{id}', 'RolesController@edit');
	Route::get('/admin/roles/edit-permissions/{id}', 'RolesController@editPermissions');
	Route::post('/admin/roles/update-permissions/{id}', 'RolesController@updatePermissions');
	Route::post('/admin/roles/update/{id}', 'RolesController@update');
	Route::get('/admin/roles/delete/{id}', 'RolesController@delete');

});
