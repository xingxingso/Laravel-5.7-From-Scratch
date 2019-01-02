<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // app()->bind();
        // $this->app->bind('foo');
        // $this->app->singleton('foo', function () {
        //     return 'bar';
        // });
        
        $this->app->bind(
            \App\Repositories\UserRepository::class,
            \App\Repositories\DbUserRepository::class
        );
    }
}
