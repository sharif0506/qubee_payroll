<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyCode;
use App\Employee;
use Auth;

class EmployeeAuthenticationController extends Controller {

    public function showLogin() {      
        return view('authentication.login');
    }

    public function showRegistration() {
        $companyCodes = CompanyCode::all(['id', 'code_name']);
        return view('authentication.registration', ['companyCodes' => $companyCodes]);
    }

    public function login(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);
        $userID = $request->user_id;
        $password = $request->password;

        if (Auth::guard('employees')->attempt(['user_id' => $userID, 'password' => $password])) {
            return redirect('/home');
        } else {
            return redirect('/login');
        }
    }

    public function registration(Request $request) {
        $request->validate([
            'user_id' => 'required|alpha_num|unique:employees,user_id|max:32',
            'email' => 'required|email|unique:employees,email|max:100',
            'company_code' => 'required|numeric',
            'employee_id' => 'required|unique:employees,employee_id|max:20',
            'password' => 'required|min:6|max:32|confirmed',
        ]);
        $employee = new Employee();
        $employee->user_id = $request->user_id;
        $employee->email = $request->email;
        $employee->company_code = $request->company_code;
        $employee->employee_id = $request->employee_id;
        $employee->password = bcrypt($request->password);
        $employee->status = 'active';

        $employee->save();
        return redirect('/home');
    }

    function logout() {
        Auth::guard('employees')->logout();
        return redirect('/login');
    }

}
