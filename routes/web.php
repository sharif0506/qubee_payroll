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
    Route::get('/home', 'PayrollController@index');
});

Route::get('/admin/login', 'AdminAuthenticationController@showLogin');
Route::post('/admin/login', 'AdminAuthenticationController@login');

Route::group(['middleware' => 'authenticated.admin'], function() {
    Route::get('/admin/home', 'PayrollAdminController@index');
    Route::get('/admin/user', 'PayrollAdminController@manageUser');
});

Route::get('/logout', 'EmployeeAuthenticationController@logout');
Route::get('/admin/logout', 'AdminAuthenticationController@logout');

