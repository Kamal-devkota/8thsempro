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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

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

    //notice routes
	Route::get('/hrm/notice', 'NoticeController@index');
	Route::get('/hrm/notice/create', 'NoticeController@create');
	Route::post('/hrm/notice/store', 'NoticeController@store');
	Route::get('/hrm/notice/published/{id}', 'NoticeController@published');
	Route::get('/hrm/notice/unpublished/{id}', 'NoticeController@unpublished');
	Route::get('/hrm/notice/delete/{id}', 'NoticeController@destroy');

	Route::get('/hrm/notice/show', 'NoticeController@show');
});
