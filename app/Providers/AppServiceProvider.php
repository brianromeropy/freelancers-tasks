<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
        View::composer(['layouts.app', 'contacto'], function ($view) {
            $user = Auth::user();
            $presenter = $user
                ? $user->presenterProfile()
                : config('presenters.default');

            $view->with('presenter', $presenter);
        });
    }
}
