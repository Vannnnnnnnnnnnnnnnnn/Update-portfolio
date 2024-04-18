<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\home;
use App\Models\skill;
use App\Models\education;
use App\Models\experience;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{
    //

    public function index()
    {
        if (Auth::check()) {
            
            $skill =skill::count();
            $education =education::count();
            $experience =experience::count();
            return view('admin.index',
        [
            'count' => $skill,
            'edu' => $education,
            'ex' => $experience
        ]);
        } else {
            // Redirect the user to the login page or show an error message
            return redirect()->route('login.index')->with('error', 'Please log in to change your password.');
        }
       
    }

    public function home()
    {
        if (Auth::check()) {
            $home = home::all();
            return view('admin.section.home', [
    
                'home' => $home
            ]);
        } else {
            // Redirect the user to the login page or show an error message
            return redirect()->route('login.index')->with('error', 'Please log in to change your password.');
        }
       
    }

    public function update(Request $request,home $id)
    {
        $data = $request->validate([

            'name' => 'required|string',
            'role' => 'required|string', 
            'description' => 'required|string'

        ]);

        $id->update($data);

        return redirect(route('admin.home'));
    }
}
