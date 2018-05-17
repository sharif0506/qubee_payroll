<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminAuthenticationController extends Controller {

    public function showLogin() {
        if (Auth::check()) {
            return redirect('admin/home');
        }
        return view('admin.login');
    }

    public function login(Request $request) {
        if (Auth::check()) {
            return redirect('admin/home');
        }
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);
        $userID = $request->user_id;
        $password = $request->password;

        if (Auth::attempt(['user_id' => $userID, 'password' => $password])) {
            return redirect('admin/home');
        }
        return redirect('admin/login')->withErrors('Admin user credential does not matched.');
    }

    public function logout() {
        Auth::logout();
        return redirect('admin/login');
    }

}
