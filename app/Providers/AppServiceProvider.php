<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        /*$lang = App::getLocale();
        $value = (session('lang')) ? session('lang') : $lang;
        session(['lang' => $value]);*/

        View::composer('includes.nav',function ($view) {
            $pages=\App\Page::where([
                'lang'=>App::getLocale(),
                'mainPageID'=>0
            ])->orderBy('formTitle','asc')->get();
            $view->with('pages', $pages);
        });
    }
}
