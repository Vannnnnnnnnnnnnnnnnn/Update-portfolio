<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    //
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Store the user's name in the session
        $request->session()->put('name', $user->name);
        // Authentication successful, redirect to a desired location
        $request->session()->flash('alert', ['type' => 'success', 'message' => 'Login Successful!']);
        return redirect()->route('admin.index');
    } else {
        // Authentication failed, redirect back with errors
        $request->session()->flash('alert', ['type' => 'error', 'message' => 'Login Failed! Please check your credentials.']);
        return redirect()->back();
    }
}

public function verify(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $email = $request->input('email');

    // Find the user by email
    $user = User::where('email', $email)->first();

    if ($user) {
        // Log in the user
        Auth::login($user);

        // Redirect to a desired location
        $request->session()->flash('alert', ['type' => 'success', 'message' => 'Email Verified']);
        return redirect()->route('login.newpass');
    } else {
        // User with provided email not found
        $request->session()->flash('alert', ['type' => 'error', 'message' => 'No Account Found']);
        return redirect()->back();
    }
}


    

    public function reg(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'nullable|string',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.index'); // Change to your desired route after registration
    }

    public function newpass()
{
    // Check if the user is authenticated
    if (Auth::check()) {
        return view('admin login.change-pass');
    } else {
        // Redirect the user to the login page or show an error message
        return redirect()->route('login.index')->with('error', 'Please log in to change your password.');
    }
}

    public function savepass(Request $request)
    {
        $request->validate([
            'pas1' => 'required|min:8', // Add any validation rules as needed
            'pas2' => 'required|same:pas1',
        ]);
    
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $user->password = bcrypt($request->input('pas1'));
            $user->save();
    
            return redirect()->route('login.index')->with('success', 'Password updated successfully!');
        } else {
            // Handle the case where the user is not authenticated
            // Redirect the user to the login page or show an error message
            return redirect()->route('login.newpass')->with('error', 'User is not authenticated!');
        }
    }

    

public function logout()
{
    Auth::logout(); // This will clear the authentication information from the session
    session()->flash('alert', ['type' => 'success', 'message' => 'Logout Successful!']);
    return redirect()->route('login.index');
}
}
