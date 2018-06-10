<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller {

    public function index() {
        return view("employees.index");
    }

    public function showAdd() {
         return view("employees.add");
    }

    public function add(Request $request) {
        
    }

    public function showEdit($id) {
        
    }

    public function edit(Request $request) {
        
    }

    public function delete($id) {
        
    }

}
