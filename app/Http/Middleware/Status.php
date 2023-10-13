<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Status
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->status == 'معطل')
        {
            Auth::logout();
            return redirect()->route('hospital.login.index');
        }
        return $next($request);
    }
}
