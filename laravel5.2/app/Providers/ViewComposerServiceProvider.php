<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['index'], function($view){


            $theme_color = Auth::check() ? Auth::user()->theme_color : 'dark-blue';

            $view->with('theme_color', $theme_color);
        });

        view()->composer(['partials/userSidebar'], function($view){

            $user = Auth::user();

            $view->with('user', $user);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
