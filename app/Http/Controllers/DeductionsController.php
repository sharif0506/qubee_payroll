<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deduction;

class DeductionsController extends Controller {

    public function index() {
        $deductions = Deduction::all();
        return view("deduction.index", ["deductions" => $deductions]);
    }

    public function showAdd() {
        return view("deduction.add");
    }

    public function add(Request $request) {
        $request->validate([
            "name" => "required|unique:deductions,name",
            "status" => "required",
        ]);
        $deduction = new Deduction();
        $deduction->name = $request->name;        
        $deduction->status = $request->status;
        $deduction->save();
        return redirect()->back()->with("message", "New deduction added successfully");
    }

    public function showEdit($id) {
        $deduction = Deduction::findOrFail($id);
        return view("deduction.edit", ["deduction" => $deduction]);
    }

    public function edit(Request $request) {
        $request->validate([
            "name" => "required|unique:deductions,name," . $request->id,
            "status" => "required"
        ]);
        $deduction = Deduction::findOrFail($request->id);
        $deduction->name = $request->name;
        $deduction->status = $request->status;
        $deduction->save();
        return redirect()->back()->with("message", "Deduction updated successfully");
    }

    public function delete(Request $request) {
        $deduction = Deduction::findOrFail($request->id);
        $deduction->delete();
        return redirect()->back();
    }

}
