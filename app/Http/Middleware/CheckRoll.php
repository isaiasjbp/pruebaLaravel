<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoll
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
        $roll = Auth::user()->roll; 
        $estado = Auth::user()->estado; 
        if ($roll <> 1 && $estado == 1) {
            return redirect('/');
        }

        return $next($request);
    }
    
}
