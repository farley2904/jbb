<?php

namespace Jbb\Http\Middleware;

use Closure;

class DebugBarMiddleware
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
        if(!\Auth::check() || \Auth::user()->id !== 1) {
            \Debugbar::disable();
        }
        return $next($request);
    }
}
