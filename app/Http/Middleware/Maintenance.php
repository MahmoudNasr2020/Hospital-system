<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function App\helper\settings;

class Maintenance
{

    public function handle(Request $request, Closure $next)
    {
        if(settings()->maintenance == 'close' && Auth::user()->user_type != 'admin')
        {
            return redirect('hospital/maintenance');
        }
        return $next($request);
    }
}
