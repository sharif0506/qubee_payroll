<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeMonthlyIncome;
use App\EmployeeInvestment;
use App\EmployeeMonthlyDeduction;
use App\EmployeeMonthlyTax;
use App\EmployeeYearlyTax;
use App\Employee;
use App\Payroll;
use App\ProvidentFund;
use App\TaxSlab;
use Auth;

class PayrollHomeController extends Controller {

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

        $employeeMonthlyDeductions = EmployeeMonthlyDeduction::where('employee_id', $employeeInfo->employee_id)
                ->where('month', $month)
                ->where('income_year', $incomeYear)
                ->get();

        $employeeDeductionSum = EmployeeMonthlyDeduction::where('employee_id', $employeeInfo->employee_id)
                ->where('month', $month)
                ->where('income_year', $incomeYear)
                ->sum('amount');

        $employeeMonthlyTax = EmployeeMonthlyTax::where('employee_id', $employeeInfo->employee_id)
                ->where('month', $month)
                ->where('income_year', $incomeYear)
                ->first();

        $employeeInvestment = EmployeeInvestment::where('employee_id', $employeeInfo->employee_id)
                ->where('income_year', $incomeYear)
                ->first();

        $payroll = Payroll::where('income_year', $incomeYear)
                ->where('month', $month)
                ->first();

        $totalContribution = (ProvidentFund::where('income_year', $incomeYear)
                        ->sum('employee_contribution')) + (ProvidentFund::where('income_year', $incomeYear)
                        ->sum('company_contribution'));

        $employeeYearlyTaxes = EmployeeYearlyTax::where('employee_id', $employeeInfo->employee_id)
                ->where('income_year', $incomeYear)
                ->get();

        $netTaxableIncome = EmployeeYearlyTax::where('employee_id', $employeeInfo->employee_id)
                ->where('income_year', $incomeYear)
                ->sum('taxable_amount');

        $employeeTaxData = $this->getEmployeeTaxData($employeeInfo, $netTaxableIncome);       
        
        return view('home.index', [
            'employeeIncomes' => $employeePayroll,
            'employeeInfo' => $employeeInfo,
            'employeeMonthlyDeductions' => $employeeMonthlyDeductions,
            'employeeMonthlyTax' => $employeeMonthlyTax,
            'netMonthlyIncome' => $netMonthlyIncome,
            'netMonthlyDeduction' => $employeeDeductionSum,
            'month' => $month,
            'incomeYear' => $incomeYear,
            'payroll' => $payroll,
            'employeeInvestment' => $employeeInvestment,
            'totalContribution' => $totalContribution,
            'employeeYearlyTaxes' => $employeeYearlyTaxes,
            'netTaxableIncome' => $netTaxableIncome,
            'employeeYearlyTaxeData' => $employeeTaxData
        ]);
    }

    private function getEmployeeTaxData($employeeData, $totalTaxableIncome) {
        $taxSlabs = TaxSlab::all(); //select all tax slab where condition is gender
        $taxData = array();
        $incomeSlab = 0;
        foreach ($taxSlabs as $taxSlab) {
            if (($totalTaxableIncome - $taxSlab->amount) > 0) {
                $incomeSlab = $taxSlab->amount;
            } else {
                $incomeSlab = $totalTaxableIncome;
            }
            array_push($taxData, [
                "slab_order" => $taxSlab->slab_order,
                "amount" => $taxSlab->amount,
                "tax_rate" => $taxSlab->tax_rate,
                "taxable_income" => $incomeSlab,
                "calculated_tax" => ($incomeSlab * ($taxSlab->tax_rate / 100)),
            ]);
            $totalTaxableIncome = $totalTaxableIncome - $incomeSlab;
        }
        return $taxData;
    }

}
