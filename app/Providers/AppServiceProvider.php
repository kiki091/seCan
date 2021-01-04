<?php

namespace App\Providers;

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
        $this->app->bind('App\Repositories\Contracts\Banner', 'App\Repositories\Implementation\Banner');
        $this->app->bind('App\Repositories\Contracts\News', 'App\Repositories\Implementation\News');
        $this->app->bind('App\Repositories\Contracts\Category', 'App\Repositories\Implementation\Category');
        $this->app->bind('App\Repositories\Contracts\Doctor', 'App\Repositories\Implementation\Doctor');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
