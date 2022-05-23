<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('user')){
            return $next($request);
        }
        else{
            return redirect()->route("form.login")->withErrors(["You need to be logged in in order to access that page."]);
        }
    }
}
