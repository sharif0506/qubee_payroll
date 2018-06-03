<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeInfoController extends Controller {

    public function showEditUsername() {
        return view("home.editusername");
    }

    public function editUsername(Request $request) {
        $request->validate([
            'user_id' => 'required|alpha_num|unique:employees,user_id|max:32'
        ]);
//        $employee = Employee::; find employee object from db
        $employee->user_id = $request->user_id;
        $employee->save();
        redirect("/logout")->withErrors(["errors" => "You have to login with new user id"]);
    }

    public function showEditMobileNo() {
        
    }

    public function editMobileNo(Request $request) {
        
    }

    public function showChangePassword() {
        
    }

    public function changePassword(Request $request) {
        
    }

}
