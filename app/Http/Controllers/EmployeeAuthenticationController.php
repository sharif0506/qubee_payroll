<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyCode;

class EmployeeAuthenticationController extends Controller {

    public function showLogin() {
        return view('authentication.login');
    }

    public function showRegistration() {
        $companyCodes = CompanyCode::all(['id', 'code_name']);
        return view('authentication.registration', ['companyCodes' => $companyCodes]);
    }

    public function login(Request $request) {
        
    }

    public function registration(Request $request) {
        
    }

}
