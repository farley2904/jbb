<?php

namespace Jbb\Http\Middleware;

use Closure;

class GenerateMenus
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
        \Menu::make('MyNavBar', function ($menu) {
            $menu->add('*****');
        });
        return $next($request);
    }
}
