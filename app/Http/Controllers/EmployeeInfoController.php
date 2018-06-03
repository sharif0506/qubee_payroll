<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Employee;

class EmployeeInfoController extends Controller {

    public function showEditUsername() {
        return view("home.editusername");
    }

    public function editUsername(Request $request) {
        $request->validate([
            'user_id' => 'required|alpha_num|unique:employees,user_id|max:32'
        ]);
        $currentUserID = Auth::guard("employees")->user()->id;

        $employee = Employee::findOrFail($currentUserID);
        $employee->user_id = $request->user_id;
        $employee->save();
        Auth::guard("employees")->logout();
        return redirect("/login")->withErrors(["errors" => "You have to login with new user id"]);
    }

    public function showEditMobileNo() {
        return view("home.editmobile");
    }

    public function editMobileNo(Request $request) {
        $request->validate([
            'mobile_no' => 'required|numeric'
        ]);
        $currentUserID = Auth::guard("employees")->user()->id;
        $employee = Employee::findOrFail($currentUserID);
        $employee->mobile_no = $request->mobile_no;
        $employee->save();
        return redirect()->back()->with("message", "Your Mobile No Has been Updated");
    }

    public function showChangePassword() {
        
    }

    public function changePassword(Request $request) {
        
    }

}
