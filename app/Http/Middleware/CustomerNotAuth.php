<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerNotAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('loggedin')) {
            return $next($request);
        } else {
            return redirect()->route('customer.dashboard');
        }
    }
}
