<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeMonthlyIncome;
use App\Employee;
use Auth;

class PayrollHomeController extends Controller {

//    public function index() {
////        $currentMonth = date("F");
////        $currentYear = date("Y");
////        $id = Auth::guard('employees')->user()->employee_id;
//        return view('home.index');
//    }

    public function show(Request $request) {
        $employeeInfo = Employee::findOrFail(Auth::guard('employees')->user()->id);
        if (isset($request->income_year) && isset($request->month)) {
            $incomeYear = $request->income_year;
            $month = $request->month;
        } else {
//        $incomeYear last income year 
//        last month of payroll 
            $incomeYear = "2018-2019";
            $month = "July";
        }

        $employeePayroll = EmployeeMonthlyIncome::where('employee_id', $employeeInfo->employee_id)
                ->where('month', $month)
                ->where('income_year', $incomeYear)
                ->get();

        $netMonthlyIncome = EmployeeMonthlyIncome::where('employee_id', $employeeInfo->employee_id)
                ->where('month', $month)
                ->where('income_year', $incomeYear)
                ->sum('amount');

        return view('home.index', [
            'employeeIncomes' => $employeePayroll,
            'employeeInfo' => $employeeInfo,
            'netMonthlyIncome' => $netMonthlyIncome,
            'netMonthlyDeduction' => 0,
            'month' => $month,
            'incomeYear' => $incomeYear
        ]);
    }

}
