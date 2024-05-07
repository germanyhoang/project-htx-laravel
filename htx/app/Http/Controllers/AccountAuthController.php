<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountAuthController extends Controller
{
    //login
    public function getLogin(Request $request)
    {
        return view('frontend.login');
    }

    public function postLogin(Request $request)
    {
        // Validate input data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            $user = Auth::user();
            return redirect()->route('index')->with('success', 'Login successful!');
        } else {
            return redirect()->route('getLogin')->with('error', 'Invalid email or password. Please try again.');
        }
    }

    //register
    public function getRegister()
    {
        return view('frontend.register');
    }
    public function postRegister(Request $request)
    {
        // Hash::make($request->password);
        // dd($request->all());
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Create new user instance
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        // Redirect or do something else after successful registration
        return redirect()->route('getLogin')->with('success', 'Registration successful! Please login.');
    }
    //admin
    public function loginAdmin()
    {
        return view('admin.loginAdmin');
    }
    //logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }
}
