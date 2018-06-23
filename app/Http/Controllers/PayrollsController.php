<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaxSlab;
use App\Salary;
use App\Deduction;
use App\Payroll;
use App\Employee;
use App\EmployeeSalary;
use App\EmployeeMonthlyIncome;
use App\EmployeeMonthlyDeduction;

class PayrollsController extends Controller {

    public function index() {
        return view('admin.payroll');
    }

    public function generatePayroll(Request $request) {
        $request->validate([
            'income_year' => 'required',
            'month' => 'required'
        ]);
        if ($request->hasFile('additional_file')) {
            if ($request->file('additional_file')->getClientOriginalExtension() != "csv") {
                return redirect()->back()->withErrors("You must upload the additional income file in csv format");
            }
            $this->additionalIncomeFileProcess($request->file('additional_file'), $request->month, $request->income_year);
        }
        if ($request->hasFile('deduction_file')) {
            if ($request->file('deduction_file')->getClientOriginalExtension() != "csv") {
                return redirect()->back()->withErrors("You must upload the additional deduction file in csv format");
            }
            $this->deductionFileProcess($request->file('deduction_file'), $request->month, $request->income_year);
        }
        $employees = Employee::where("status", "Active")->get();
        foreach ($employees as $employee) {
            $this->monthlyIncomeProcess($employee->employee_id, $request->month, $request->income_year);
            $this->monthlyTaxProcess($employee->employee_id, $request->month, $request->income_year);
        }
        $payroll = new Payroll();
        $payroll->month = $request->month;
        $payroll->income_year = $request->income_year;
        return redirect()->back()->with("message", "Payroll generated successfully");
    }

    private function monthlyIncomeProcess($employeee_id, $month, $incomeYear) {
        //need to check fraction month
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

    private function additionalIncomeFileProcess($fileObject, $month, $incomeYear) {
        $fileHandler = fopen($fileObject->getRealPath(), "r");
        $counter = 0;
        while (!feof($fileHandler)) {
            if ($counter == 0) {
                $csvHeader = fgetcsv($fileHandler);
                $salaryIDList = $this->getSalaryIDList($csvHeader);
            }
            $additionalIncomeData = fgetcsv($fileHandler);
            $this->monthlyAdditionalIncomeProcess($additionalIncomeData, $salaryIDList, $month, $incomeYear);
            $counter++;
        }
        fclose($fileHandler);
    }

    private function getSalaryIDList($csvHeader) {
        $salaryIDList = array();
        foreach ($csvHeader as $header) {
            $salary = Salary::where('name', trim($header))
                    ->where('status', 'Active')
                    ->where('salary_type', 'Occasional')
                    ->get();
            if (count($salary) > 0) {
                array_push($salaryIDList, $salary->id);
            } else {
                array_push($salaryIDList, 0);
            }
        }
        return $salaryIDList;
    }

    private function monthlyAdditionalIncomeProcess($additionalIncomeData, $salaryIDList, $month, $incomeYear) {
        $employeeID = $additionalIncomeData[0];
        if ($employeeID == 0) {
            return;
        }
        for ($i = 1; $i < sizeof($additionalIncomeData); $i++) {
            $salaryID = $salaryIDList[$i];
            $amount = $additionalIncomeData[$i];
            if ($salaryID == 0 || $amount == 0) {
                continue;
            }
            $employeeMonthlySalary = new EmployeeMonthlyIncome();
            $employeeMonthlySalary->employee_id = $employeeID;
            $employeeMonthlySalary->salary_id = $salaryID;
            $employeeMonthlySalary->amount = $amount;
            $employeeMonthlySalary->month = $month;
            $employeeMonthlySalary->income_year = $incomeYear;
            $employeeMonthlySalary->save();
        }
    }

    private function deductionFileProcess($fileObject, $month, $incomeYear) {
        $fileHandler = fopen($fileObject->getRealPath(), "r");
        $counter = 0;
        while (!feof($fileHandler)) {
            if ($counter == 0) {
                $csvHeader = fgetcsv($fileHandler);
                $deductionIDList = $this->getDeductionIDList($csvHeader);
            }
            $deductionData = fgetcsv($fileHandler);
            $this->monthlyDeductionProcess($deductionData, $deductionIDList, $month, $incomeYear);
            $counter++;
        }
        fclose($fileHandler);
    }

    private function getDeductionIDList($csvHeader) {
        $deductionIDList = array();
        foreach ($csvHeader as $header) {
            $deduction = Deduction::where('name', trim($header))
                    ->where('status', 'Active')
                    ->get();
            if (count($deduction) > 0) {
                array_push($deductionIDList, $deduction->id);
            } else {
                array_push($deductionIDList, 0);
            }
        }
        return $deductionIDList;
    }

    private function monthlyDeductionProcess($deductionData, $deductionIDList, $month, $incomeYear) {
        $employeeID = $deductionData[0];
        if ($employeeID == 0) {
            return;
        }
        for ($i = 1; $i < sizeof($deductionData); $i++) {
            $deductionID = $deductionIDList[$i];
            $amount = $deductionData[$i];
            if ($deductionID == 0 || $amount == 0) {
                continue;
            }
            $employeeMonthlySalary = new EmployeeMonthlyDeduction();
            $employeeMonthlySalary->employee_id = $employeeID;
            $employeeMonthlySalary->deduction_id = $deductionID;
            $employeeMonthlySalary->amount = $amount;
            $employeeMonthlySalary->month = $month;
            $employeeMonthlySalary->income_year = $incomeYear;
            $employeeMonthlySalary->save();
        }
    }

    private function monthlyTaxProcess($employeeID, $incomeYear) {
        //check employee will get payroll full income year
        $totalTaxableIncome = $this->getTaxableSalaryOnMonthlyIncome($employeeID) +
                $this->getTaxableSalaryOnAdditionalIncome($employeeID, $incomeYear);

        $incomeTax = 0;
        $taxSlabs = TaxSlab::all();
        foreach ($taxSlabs as $taxSlab) {
            $incomeSlab = abs($totalTaxableIncome - $taxSlab->amount);
            $incomeTax = $incomeTax + ($incomeSlab * ($taxSlab->tax_rate) / 100);
            if (($totalTaxableIncome - $taxSlab->amount) <= 0) {
                break;
            }
            $totalTaxableIncome = $totalTaxableIncome - $taxSlab->amount;
        }
    }

    private function getTaxableSalaryOnMonthlyIncome($employeeID) {
        $employeeSalaries = EmployeeSalary::where('employee_id', $employeeID)->get();
        $totalTaxableIncome = 0;
        $basicSalaryAmount = $this->getBasicSalary($employeeID);
        foreach ($employeeSalaries as $employeeSalary) {
            $totalTaxableIncome = $totalTaxableIncome +
                    $this->getTaxableSalary($employeeSalary->salary_id, $basicSalaryAmount);
        }
        return $totalTaxableIncome;
    }

    private function getTaxableSalaryOnAdditionalIncome($employeeID, $incomeYear) {
        $employeeMonthlyIncomes = EmployeeMonthlyIncome::where('employee_id', $employeeID)
                ->where('income_year', $incomeYear)
                ->get();
        $totalTaxableIncome = 0;
        if ($employeeMonthlyIncomes->isEmpty()) {
            return $totalTaxableIncome;
        }
        $additionalSalaries = Salary::where('status', 'Active')
                ->where('salary_type', 'Occasional')
                ->get();

        foreach ($additionalSalaries as $additionalSalary) {
            foreach ($employeeMonthlyIncomes as $employeeMonthlyIncome) {
                if ($additionalSalary->id == $employeeMonthlyIncome->salary_id) {
                    $totalTaxableIncome = $totalTaxableIncome + $employeeMonthlyIncome->amount;
                }
            }
        }
        return $totalTaxableIncome;
    }

    private function getTaxableSalary($salaryID, $salaryAmount, $basicSalaryAmount) {
        $taxableSalary = 0;
        $salary = Salary::findOrFail($salaryID);
        if ($salary->condition == 100) {
            $taxableSalary = $salaryAmount * 12;  //taxable salary for 12 month
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

    private function getBasicSalary($employeeID) {
        $basicSalaryAmount = 0;
        $salary = Salary::where('name', 'Basic')
                ->where('status', 'Active')
                ->get();
        if ($salary->isEmpty()) {
            return $basicSalaryAmount;
        }
        $employeeSalary = EmployeeSalary::where('employee_id', $employeeID)
                ->where('salary_id', $salary->id)
                ->get();
        if ($employeeSalary->isEmpty()) {
            return $basicSalaryAmount;
        }
        return $employeeSalary->amount;
    }

}
