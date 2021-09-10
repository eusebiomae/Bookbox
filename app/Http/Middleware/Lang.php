<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class Lang
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
        $lang = Session::get('lang');
        \Lang::setLocale($lang);
        return $next($request);
    }
}
