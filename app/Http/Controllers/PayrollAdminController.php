<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PayrollAdminController extends Controller {

    public function index() {
        return view('admin.home');
    }

    public function manageUser() {
        $users = User::all();


        return view('admin.user', ['users' => $users]);
    }

}
