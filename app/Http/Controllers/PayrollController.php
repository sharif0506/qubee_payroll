<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeMonthlyIncome;
use App\Employee;
use Auth;

class PayrollController extends Controller {

    public function index() {
//        $currentMonth = date("F");
//        $currentYear = date("Y");
//        $id = Auth::guard('employees')->user()->employee_id;
        return view('home.index');
    }

    public function show(Request $request) {
        $employeeID = Auth::guard('employees')->user()->employee_id;
        $incomeYear = $request->income_year;
        $month = $request->month;
        $employeePayroll = EmployeeMonthlyIncome::where('employee_id', $employeeID)
                ->where('month', $month)
                ->where('income_year', $incomeYear)
                ->get();
        return view('home.index', ['employeeIncomes' => $employeePayroll]);
    }

}
