<?php

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

Route::group(['middleware' => 'not.authenticated.employee'], function() {

    Route::get('/', 'EmployeeAuthenticationController@showLogin');

    Route::get('/login', 'EmployeeAuthenticationController@showLogin');

    Route::post('/login', 'EmployeeAuthenticationController@login');

    Route::get('/registration', 'EmployeeAuthenticationController@showRegistration');

    Route::post('/registration', 'EmployeeAuthenticationController@registration');
});

Route::group(['middleware' => 'authenticated.employee'], function() {
    Route::get('/home', 'PayrollHomeController@show');
    Route::post('/home', 'PayrollHomeController@show');

    Route::get('/change/username', 'EmployeeInfoController@showEditUsername');
    Route::post('/change/username', 'EmployeeInfoController@editUsername');

    Route::get('/change/mobile', 'EmployeeInfoController@showEditMobileNo');
    Route::post('/change/mobile', 'EmployeeInfoController@editMobileNo');

    Route::get('/change/password', 'EmployeeInfoController@showChangePassword');
    Route::post('/change/password', 'EmployeeInfoController@changePassword');
});

Route::get('/admin/login', 'AdminAuthenticationController@showLogin');
Route::post('/admin/login', 'AdminAuthenticationController@login');

Route::group(['middleware' => 'authenticated.admin'], function() {
    Route::get('/admin/home', 'PayrollAdminController@index');
    Route::get('/admin/user', 'PayrollAdminController@manageUser');


    Route::get('/admin/department', 'DepartmentsController@index');
    Route::get('/admin/department/add', 'DepartmentsController@showAdd');
    Route::post('/admin/department/add', 'DepartmentsController@add');
    Route::get('/admin/department/edit/{id}', 'DepartmentsController@showEdit')->where('id', '[0-9]+');
    Route::post('/admin/department/edit/{id}', 'DepartmentsController@edit')->where('id', '[0-9]+');
    Route::get('/admin/department/delete/{id}', 'DepartmentsController@delete')->where('id', '[0-9]+');


    Route::get('/admin/subdepartment', 'SubDepartmentsController@index');
    Route::get('/admin/subdepartment/add', 'SubDepartmentsController@showAdd');
    Route::post('/admin/subdepartment/add', 'SubDepartmentsController@add');
    Route::get('/admin/subdepartment/edit/{id}', 'SubDepartmentsController@showEdit')->where('id', '[0-9]+');
    Route::post('/admin/subdepartment/edit/{id}', 'SubDepartmentsController@edit')->where('id', '[0-9]+');
    Route::get('/admin/subdepartment/delete/{id}', 'SubDepartmentsController@delete')->where('id', '[0-9]+');


    Route::get('/admin/salary', 'SalariesController@index');
    Route::get('/admin/salary/add', 'SalariesController@showAdd');
    Route::post('/admin/salary/add', 'SalariesController@add');
    Route::get('/admin/salary/edit/{id}', 'SalariesController@showEdit')->where('id', '[0-9]+');
    Route::post('/admin/salary/edit/{id}', 'SalariesController@edit')->where('id', '[0-9]+');
    Route::get('/admin/salary/delete/{id}', 'SalariesController@delete')->where('id', '[0-9]+');
 
    
    Route::get('/admin/employee', 'EmployeesController@index');
    Route::get('/admin/employee/add', 'EmployeesController@showAdd');
    Route::post('/admin/employee/add', 'EmployeesController@add');
    Route::get('/admin/employee', 'EmployeesController@index');
    Route::get('/admin/employee', 'EmployeesController@index');
    
    
    Route::get('/admin/payroll', 'PayrollsController@index');
    Route::post('/admin/payroll', 'PayrollsController@generatePayroll');
   
    
    
});

Route::get('/logout', 'EmployeeAuthenticationController@logout');
Route::get('/admin/logout', 'AdminAuthenticationController@logout');

