<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubDepartment;
use App\Department;

class SubDepartmentsController extends Controller {

    public function index() {
        $subDepartments = SubDepartment::all();
        return view("sub_departments.index", array("subDepartments" => $subDepartments));
    }

    public function showAdd() {
        $departments = Department::where('status', 'Active')->get();
        return view("sub_departments.add", [ "departments" => $departments]);
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'department_id' => 'required|max:100',
            'status' => 'required|in:Active,Deactive',
        ]);
        $subDepartment = new SubDepartment();
        $subDepartment->department_id = $request->department_id;
        $subDepartment->name = $request->name;
        $subDepartment->status = $request->status;
        $subDepartment->save();
        return redirect()->back()->with("message", "New department added successfully");
    }

    public function showEdit($id) {
        $subDepartment = SubDepartment::findOrFail($id);
        $departments = Department::where('status', 'Active')->get();
        return view("sub_departments.edit", [
            "subDepartment" => $subDepartment,
            "departments" => $departments
        ]);
    }

    public function edit(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'department_id' => 'required|numeric',
            'status' => 'required|in:Active,Deactive',
        ]);
        $subDepartment = SubDepartment::findOrFail($request->id);
        $subDepartment->department_id = $request->department_id;
        $subDepartment->name = $request->name;
        $subDepartment->status = $request->status;
        $subDepartment->save();
        return redirect()->back()->with("message", "Sub department info updated successfully");
    }

    public function delete(Request $request) {
        $subDepartment = SubDepartment::findOrFail($request->id);
        $subDepartment->delete();
//      return redirect()->back()->with("message", "Department deleted successfully");
        return redirect()->back();
    }

}
