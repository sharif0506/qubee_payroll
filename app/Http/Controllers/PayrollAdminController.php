<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollAdminController extends Controller {

    function index() {
        return view('admin.home');
    }

}
