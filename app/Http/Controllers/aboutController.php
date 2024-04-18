<?php

namespace App\Http\Controllers;
use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class aboutController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $about = about::all();
        return view('admin.section.about', [

            'about' => $about
        ]);
        } else {
            // Redirect the user to the login page or show an error message
            return redirect()->route('login.index')->with('error', 'Please log in to change your password.');
        }
       
    }

    public function update(Request $request,about $id)
    {
        $data = $request->validate([

            'name' => 'required|string',
            'role' => 'required|string', 
            'month' => 'required|string',
           'day' => 'required|string',
           'year' => 'required|string',
           'site' => 'required|string',
           'course' => 'required|string',
           'location' => 'required|string',
           'age' => 'required|string',
           'email' => 'required|string',
           'phone' => 'required|string',
           'freelance' => 'required|string',
            'description' => 'required|string'
          

        ]);

        $id->update($data);

        return redirect(route('about.index'));
    }

   
}
