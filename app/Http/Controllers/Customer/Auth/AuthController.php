<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Hash;
use Session;

class AuthController extends Controller
{
    public function register()
    {
        return view('Customer.Auth.register');
    }


    public function registerSubmit(Request $request)
    {
        $request->validate([
            "name" => "required|alpha|min:3",
            "email" => "required|email|unique:customers,email",
            "password" => "required|min:6",
            "confirmpassword" => "required|same:password|min:6",
        ]);

        // Create a new customer record
        $registerRecord = new Customer();
        $registerRecord->name = $request->input('name');
        $registerRecord->email = $request->input('email');
        $registerRecord->password = Hash::make($request->input('password'));
        $registerRecord->save();
        if($registerRecord)
        {
            if (Auth::guard('customer')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                Session::put('loggedin', true);
                return redirect()->route('customer.dashboard');
            } else {
                return redirect()->back()->withInput();
            }
        }
    }


    public function login()
    {
        return view('Customer.Auth.login');
    }

    public function loginSubmit(request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            Session::put('loggedin', true);
            return redirect()->route('customer.dashboard');
        } else {
            return redirect()->back()->withErrors(['loginError' => 'Invalid credentials.']);
        }

    }

    public function customerLogout()
    {
        Session::forget('loggedin');
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }

}
