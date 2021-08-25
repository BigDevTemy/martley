<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;
class super_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->hasRole('super-admin')){
                return $next($request);
            }
            else{
                return Redirect('/admin/login');
            }
        }
        
       
    }
}
