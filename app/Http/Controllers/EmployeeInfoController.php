<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
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
            "mobile_no" => 'required|numeric'
        ]);
        $currentUserID = Auth::guard("employees")->user()->id;
        $employee = Employee::findOrFail($currentUserID);
        if ($employee->mobile_no == $request->mobile_no) {
            return redirect("/change/mobile")->withErrors(["errors" => "You have entered same mobile number as current."]);
        }
        $employee->mobile_no = $request->mobile_no;
        $employee->save();
        return redirect()->back()->with("message", "Your Mobile No Has been Updated");
    }

    public function showChangePassword() {
        return view("home.editpassword");
    }

    public function changePassword(Request $request) {
        $request->validate([
            "current_password" => "required",
            "new_password" => "required|min:6|max:32|confirmed"
        ]);

        $currentUserID = Auth::guard("employees")->user()->id;
        $employee = Employee::findOrFail($currentUserID);
        $currentPassword = $request->current_password;

        if (!Hash::check($currentPassword, $employee->password)) {
            return redirect("/change/password")->withErrors([
                        "errors" => "Current password does not match."
            ]);
        }
        $newPassword = bcrypt($request->new_password);
        $employee->password = $newPassword;
        $employee->save();
        Auth::guard("employees")->logout();
        return redirect("/login")->withErrors([
                    "errors" => "Password changed successfully."
                    . "You have to login with new password"]);
    }

}
