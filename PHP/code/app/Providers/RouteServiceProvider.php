<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware(['api', 'auth:sanctum'])
                ->prefix('api')
                ->name('api.')
                ->group(base_path('routes/api.php'));
            #blogに関した設定
            Route::middleware(['web', 'auth:sanctum', 'verified'])
                ->group(base_path('routes/web.php'));
            #loginとloginの認証に関した設定
            Route::middleware('web')
                ->group(base_path('routes/auth.php'));
            #dashboardに関した設定
            Route::middleware(['web', 'auth', 'password.confirm'])
                ->prefix('/dashboard')
                ->name('dashboard.')
                ->group(base_path('routes/dashboard.php'));
            # 説明ーimplicit bindingというBlogControolerのshowでのURL指定に関してRouteServiceProviderからも設定可能
            # Route::bind('blog', function ($value)){
            #    return Blog::where('name',$value)->firstOrFail();
            #}    
            #or
            #Route::model('blog', Blog::class);
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
