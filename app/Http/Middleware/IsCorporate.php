<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsCorporate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->type == 'corporate') {

            return $next($request);

        } else {

            abort(403);
            
        }

    }
}
