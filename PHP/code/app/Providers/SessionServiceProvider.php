<?php

namespace App\Providers;

use App\Enums\Provider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

/**
 * @mixin \Illuminate\Contracts\Session\Session
 */
class SessionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {#説明ーsession::macroの中の$thisはセッションマネジャ、socialliteはログインした使用者をセッションに登録
        Session::macro('socialite', function (Provider $provider, string $email = null) {
            if (is_null($email)) {
                return $this->get('socialite.'.$provider->value);
            }

            $this->put('socialite.'.$provider->value, $email);
        });
        #socialiteMissingAllの場合はログインした使用者とログインしなかった使用者を区別するため
        Session::macro('socialiteMissingAll', function () {
            return $this->missing('socialite');
        });
    }
}
