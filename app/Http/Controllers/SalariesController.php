<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salary;

class SalariesController extends Controller {

    public function index() {
        $salaries = Salary::all();
        return view("salary.index", ["salaries" => $salaries]);
    }

    public function showAdd() {
        return view("salary.add");
    }

    public function add(Request $request) {
        $request->validate([
            "name" => "required|unique:salaries,name",
            "condition" => "required",
            "status" => "required",
            "status" => "required",
            "salary_type" => "required",
        ]);
        $salary = new Salary();
        $salary->name = $request->name;
        $salary->tax_limit1 = $request->tax_limit1;
        $salary->tax_limit2 = $request->tax_limit2;
        $salary->tax_limit3 = $request->tax_limit3;
        $salary->condition = $request->condition;
        $salary->status = $request->status;
        $salary->salary_type = $request->salary_type;      
        $salary->custom_field1 = $request->custom_field1;
        $salary->custom_field2 = $request->custom_field2;
        $salary->save();
        return redirect()->back()->with("message", "New salary added successfully");
    }

    public function showEdit($id) {
        $salary = Salary::findOrFail($id);
        return view("salary.edit", ["salary" => $salary]);
    }

    public function edit(Request $request) {
        $request->validate([
            "name" => "required|unique:salaries,name," . $request->id,
            "condition" => "required",
            "status" => "required",
            "salary_type" => "required",
        ]);
        $salary = Salary::findOrFail($request->id);
        $salary->name = $request->name;
        $salary->tax_limit1 = $request->tax_limit1;
        $salary->tax_limit2 = $request->tax_limit2;
        $salary->tax_limit3 = $request->tax_limit3;
        $salary->condition = $request->condition;
        $salary->status = $request->status;
        $salary->salary_type = $request->salary_type;
        $salary->custom_field1 = $request->custom_field1;
        $salary->custom_field2 = $request->custom_field2;
        $salary->save();
        return redirect()->back()->with("message", "Salary updated successfully");
    }

    public function delete(Request $request) {
        $salary = Salary::findOrFail($request->id);
        $salary->delete();
        return redirect()->back();
    }

}
