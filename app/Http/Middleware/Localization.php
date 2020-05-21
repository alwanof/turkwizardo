<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Localization
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
        if (session()->has('lang')) {
            App::setLocale(session()->get('lang'));
        }else{
            $lang=preg_split('/,|;/', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            App::setLocale($lang[1]);
            session(['lang' => $lang[1]]);
        }


        return $next($request);
    }
}
