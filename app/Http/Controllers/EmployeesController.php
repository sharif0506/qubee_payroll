<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use App\SubDepartment;
use App\Salary;

class EmployeesController extends Controller {

    public function index() {
        $employees = Employee::all();
        return view("employees.index", ["employees" => $employees]);
    }

    public function show() {
        $employees = Employee::all();
        return view("employees.index", ["employees" => $employees]);
    }

    public function showAdd() {
        $departments = Department::where('status', 'Active')->get();
        $subDepartments = SubDepartment::where('status', 'Active')->get();
        $salaries = Salary::where('status', 'Active')->get();
        return view("employees.add", [
            "departments" => $departments,
            "subDepartments" => $subDepartments,
            "salaries" => $salaries
        ]);
    }

    public function add(Request $request) {
        $request->validate([
            'user_id' => 'required|alpha_num|unique:employees,user_id|max:32',
            'email' => 'required|email|unique:employees,email|max:100',
            'company_code' => 'required',
            'employee_id' => 'required|unique:employees,employee_id|max:20',
            'mobile_no' => 'required|numeric',
            'password' => 'required|min:6|max:32|confirmed',
            'first_name' => 'required|regex:/^[A-Za-z. -]+$/|max:50',
            'last_name' => 'required|regex:/^[A-Za-z. -]+$/|max:50',
            'designation' => 'required|max:50',
            'date_of_birth' => 'required|date',
            'date_of_join' => 'required|date',
        ]);
    }

    public function showEdit($id) {
        
    }

    public function edit(Request $request) {
        
    }

    public function delete($id) {
        
    }

}
