<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App\User;

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
        $adminRole = Auth::user()->roles()->pluck('name');
        if($adminRole->contains('admin')){
            return $next($request);
        }

    }
}
