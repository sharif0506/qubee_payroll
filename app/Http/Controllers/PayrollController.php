<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollController extends Controller {

    function index() {
        return view('home.index');
    }

}
