<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->isAdmin == 1){ //or (Auth::user()->isAdmin == true)
            return $next($request); //default line
        }

        return redirect('home')->with('error', 'You do not have Admin rights');
    }
}
