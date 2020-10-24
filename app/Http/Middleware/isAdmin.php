<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        if(auth()->user()->account_type == '1'){
            return $next($request);
        } else {
            return redirect('/')->with('error', 'You don\'t have Worker Priviledges!');
        }
    }
}
