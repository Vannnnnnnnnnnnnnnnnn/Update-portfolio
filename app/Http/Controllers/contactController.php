<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class contactController extends Controller
{
    //

    public function index()
    {
        if (Auth::check()) {
            return view('admin.section.contact');
        } else {
            // Redirect the user to the login page or show an error message
            return redirect()->route('login.index')->with('error', 'Please log in to change your password.');
        }
       
    }
}
