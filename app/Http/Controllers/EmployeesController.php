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

//        dd($employees->details()->department_id);
//        foreach($employees as $employee){
//            dd($employee->details()->designation);
//        }
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
        
    }

    public function showEdit($id) {
        
    }

    public function edit(Request $request) {
        
    }

    public function delete($id) {
        
    }

}
