<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/*
use App/Foo;
use App/Bar;
use App/Baz;
*/
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
       /* $this->app->bind(Baz::class, function($app){
            $foo = new Foo('Hello, world');

            return new Baz($foo, $app->make(Bar::class));
        })
        */
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
