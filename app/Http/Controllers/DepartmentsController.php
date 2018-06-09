<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\SubDepartment;

class DepartmentsController extends Controller {

    public function index() {
        $departments = Department::all();
        return view("departments.index", array("departments" => $departments));
    }

    public function showAdd() {
        return view("departments.add");
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required|unique:departments,name|max:100',
            'status' => 'required|in:Active,Deactive',
        ]);
        $department = new Department();
        $department->name = $request->name;
        $department->status = $request->status;
        $department->save();
        return redirect()->back()->with("message", "New department added successfully");
    }

    public function showEdit($id) {
        $department = Department::findOrFail($id);
        return view("departments.edit", ["department" => $department]);
    }

    public function edit(Request $request) {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $request->id . '|max:100',
            'status' => 'required|in:Active,Deactive',
        ]);
        $department = Department::findOrFail($request->id);
        $department->name = $request->name;
        $department->status = $request->status;
        $department->save();
        return redirect()->back()->with("message", "Department Info updated successfully");
    }

    public function delete(Request $request) {
        $department = Department::findOrFail($request->id);
        $subDepartment = SubDepartment::where("department_id", $request->id)->get();
        if ($subDepartment->count() > 0) {
            return redirect()->back()->with("message", "The Department has sub departments");
        }
        $department->delete();
//        return redirect()->back()->with("message", "Department deleted successfully");
        return redirect()->back();
    }

}
