<?php

namespace App\Http\Middleware;

use Closure;

class BlokLog
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
         $response = $next($request);

        if (
                $request->session()->has('username') && 
                $request->session()->has('password') &&
                $request->session()->has('role_id')
            ){
 
            return redirect('dashboard');
        }

        return $response;
    }
}
