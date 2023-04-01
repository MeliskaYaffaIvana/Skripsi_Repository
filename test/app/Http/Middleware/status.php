<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        if(Auth::User()->status == $role){
            return $next($request);
        }else{
            return redirect('login')->with('error','Anda tidak punya akses');
        }
        
    }
}
