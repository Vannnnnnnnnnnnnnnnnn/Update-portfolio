<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //

    public function index()
    {
        return view('admin login.index');
    }

    public function forgot()
    {
        return view('admin login.forgot');
    }

    public function newpass()
    {
        return view('admin login.change-pass');
    }
}
