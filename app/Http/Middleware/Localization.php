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

            if(array_key_exists(1,$lang)){
                //dd($lang[1]);
                App::setLocale($lang[1]);
                $browserLang=$lang[1];
            }else{
                //dd(explode('-',$lang[0])[0]);
                App::setLocale(explode('-',$lang[0])[0]);
                $browserLang=explode('-',$lang[0])[0];
            }
            session(['lang' => $browserLang]);



        }


        return $next($request);
    }
}
