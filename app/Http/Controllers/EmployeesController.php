<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use App\SubDepartment;
use App\Salary;
use App\EmployeeDetail;
use App\EmployeeSalary;

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

        $employee = new Employee();
        $employee->user_id = $request->user_id;
        $employee->email = $request->email;
        $employee->company_code = $request->company_code;
        $employee->employee_id = $request->employee_id;
        $employee->mobile_no = $request->mobile_no;
        $employee->password = bcrypt($request->password);
        $employee->status = $request->status;

        $employeeDetails = new EmployeeDetail();
        $employeeDetails->employee_id = $request->employee_id;
        $employeeDetails->first_name = $request->first_name;
        $employeeDetails->last_name = $request->last_name;
        $employeeDetails->designation = $request->designation;
        $employeeDetails->category = $request->category;
        $employeeDetails->department_id = $request->department_id;
        $employeeDetails->sub_department_id = $request->sub_department_id;
        $employeeDetails->date_of_birth = $request->date_of_birth;
        $employeeDetails->date_of_join = $request->date_of_join;
        $employeeDetails->date_of_leave = $request->date_of_leave;
        $employeeDetails->grade = $request->grade;
        $employeeDetails->step = $request->step;
        $employeeDetails->band = $request->band;
        $employeeDetails->tin = $request->tin;
        $employeeDetails->level = $request->level;
        $employeeDetails->address = $request->address;


        foreach ($request->salaries as $salary) {
            if (isset($salary['id']) && isset($salary['amount'])) {
                $employeeSalary = new EmployeeSalary();
                $employeeSalary->employee_id = $request->employee_id;
                $employeeSalary->salary_id = $salary['id'];
                $employeeSalary->amount = $salary['amount'];
                $employeeSalary->taxable_amount = $this->getTaxableSalary($salary['id'], $salary['amount']);
            }
        }
    }

    private function getTaxableSalary($salary_id, $salary_amount) {
        $taxable_salary = 0;
        $salary = Salary::findOrFail($salary_id);
        if ($salary->condition == 100) {
            $taxable_salary = $salary_amount * 12;  //yearly taxable salary
        } else if ($salary->condition == "Lowest") {
            //calculate limit1 amount and find lowest
        }
    }

    public function showEdit($id) {
        
    }

    public function edit(Request $request) {
        
    }

    public function delete($id) {
        
    }

}
