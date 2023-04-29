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
    /*
    public $bindings = [
        serverProvider:: => DigitaloceanServerProvider::class;
    ]
    public $singleton = [
        DowntimeNotifier::class => PingdomDowntimeNotfier::class,
        ServerProvider::class => ServerToolsProvider::class,
    ]
    */
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
