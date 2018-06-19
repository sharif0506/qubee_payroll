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
        if ($employees->isEmpty()) {
            return view("employees.index", ["employees" => FALSE]);
        }
        return view("employees.index", ["employees" => $employees]);
    }

    public function show() {
        $employees = Employee::all();
        return view("employees.index", ["employees" => $employees]);
    }

    public function showAdd() {
        $departments = Department::where('status', 'Active')->get();
        $subDepartments = SubDepartment::where('status', 'Active')->get();
        $salaries = Salary::where('salary_type', 'Monthly')->where('status', 'Active')->get();
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
            'salaries' => 'required|array'
        ]);

        $employee = new Employee();
        $employee->user_id = $request->user_id;
        $employee->email = $request->email;
        $employee->company_code = $request->company_code;
        $employee->employee_id = $request->employee_id;
        $employee->mobile_no = $request->mobile_no;
        $employee->password = bcrypt($request->password);
        $employee->status = $request->status;
        $employee->save();

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

        $employeeDetails->save();

        $basicSalaryAmount = $this->getBasicSalary($request->salaries);

        foreach ($request->salaries as $salary) {

            if (isset($salary['id']) && isset($salary['amount'])) {
                $employeeSalary = new EmployeeSalary();
                $employeeSalary->employee_id = $request->employee_id;
                $employeeSalary->salary_id = $salary['id'];
                $employeeSalary->amount = $salary['amount'];
                $employeeSalary->save();
            }
        }
        return redirect()->back()->with("message", "New Employee added successfully");
    }

    private function getTaxableSalary($salaryID, $salaryAmount, $basicSalaryAmount) {
        $taxableSalary = 0;
        $salary = Salary::findOrFail($salaryID);
        if ($salary->condition == 100) {
            $taxableSalary = $salaryAmount * 12;  //yearly taxable salary
        } else if ($salary->condition == "Lowest") {
            $tax_limit1 = ($salary->tax_limit1 !== NULL) ? ($basicSalaryAmount * (($salary->tax_limit1) / 100) * 12) : 0;
            $tax_limit2 = ($salary->tax_limit2 !== NULL) ? $salary->tax_limit2 : 0;
            $tax_limit3 = ($salary->tax_limit3 !== NULL) ? $salary->tax_limit3 : 0;
            $taxExemptedAmount = min(array_filter(array($tax_limit1, $tax_limit2, $tax_limit3)));
            if (($salaryAmount * 12) > $taxExemptedAmount) {
                $taxableSalary = ($salaryAmount * 12) - $taxExemptedAmount;
            }
        }
        return $taxableSalary;
    }

    private function getBasicSalaryID() {
        $basicSalary = Salary::where('name', 'Basic')->first();
        $basicSalaryID = $basicSalary->id;
        return $basicSalaryID;
    }

    private function getBasicSalary($salaries) {
        $basicSalary = 0;
        foreach ($salaries as $salary) {
            if ($salary['id'] == $this->getBasicSalaryID()) {
                $basicSalary = $salary['amount'];
                break;
            }
        }
        return $basicSalary;
    }

    public function showEdit($id) {
        
    }

    public function edit(Request $request) {
        
    }

    public function delete($id) {
        
    }

}
