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
Route::get('/login', 'EmployeeAuthenticationController@showLogin');

Route::post('/login', 'EmployeeAuthenticationController@login');

Route::get('/registration', 'EmployeeAuthenticationController@showRegistration');

Route::post('/registration', 'EmployeeAuthenticationController@registration');

Route::get('/home', 'PayrollController@index');



