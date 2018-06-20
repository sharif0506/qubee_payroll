<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payroll;
use App\Employee;
use App\EmployeeSalary;
use App\EmployeeMonthlyIncome;

class PayrollsController extends Controller {

    public function index() {
        return view('admin.payroll');
    }

    public function generatePayroll(Request $request) {
        $request->validate([
            'income_year' => 'required',
            'month' => 'required'
        ]);

        $fileName = $request->additional_file;
        $file = fopen($fileName, "r");
        $fileContent = fgetcsv($file);
        dd($fileContent);
        $payroll = new Payroll();
        $payroll->month = $request->month;
        $payroll->income_year = $request->income_year;
        $employees = Employee::where("status", "Active")->get();
        foreach ($employees as $employee) {
            $this->monthlyIncomeProcess($employee->employee_id, $request->month, $request->income_year);
            $this->monthlyIncomeTaxProcess($employee->employee_id, $request->month, $request->income_year);
        }
        return redirect()->back()->with("message", "Payroll generated successfully");
    }

    private function monthlyIncomeProcess($employeee_id, $month, $incomeYear) {
        $employeeSalaries = EmployeeSalary::where("employee_id", $employeee_id)->get();
        foreach ($employeeSalaries as $employeeSalary) {
            $monthlyIncome = new EmployeeMonthlyIncome();
            $monthlyIncome->employee_id = $employeee_id;
            $monthlyIncome->salary_id = $employeeSalary->salary_id;
            $monthlyIncome->amount = $employeeSalary->amount;
            $monthlyIncome->month = $month;
            $monthlyIncome->income_year = $incomeYear;
            $monthlyIncome->save();
        }
    }

    private function monthlyDeductionProcess($employeee_id, $month, $incomeYear) {
        
    }

    private function monthlyAdditionalIncomeProcess($employeee_id, $month, $incomeYear) {
        
    }

}
