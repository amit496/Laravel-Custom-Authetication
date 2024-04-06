<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {

        if(Auth::guard('customer')->check())
        {
            return view('Customer.Pages.dashboard');
        }

        return redirect()->route('customer.register');
    }
}
