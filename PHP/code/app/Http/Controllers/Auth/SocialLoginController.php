<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Provider;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;

class SocialLoginController extends Controller
{
    /**
     * 説明ーサービス提供者redirect,元redirect
     * social loginを作れるsocialiteは認証パッケージ
     * enumsのproviderをもらってredirectする
     */
    public function create(Provider $provider): SymfonyRedirectResponse
    {
        return Socialite::driver($provider->value)->redirect();
    }

    /**
     * ソーシャルログイン,元callback
     * socialUserはただもらって、userにセーブする,認証して別のセッションを指定する
     */
    public function store(Provider $provider): RedirectResponse
    {
        $socialUser = Socialite::driver($provider->value)->user();
        $user = $this->register($socialUser);

        auth()->login($user);

        session()->socialite($provider, $socialUser->getEmail());

        return redirect()->intended();
    }

    /**
     * ソーシャル使用者登録
     */
    private function register(SocialiteUser $socialUser): User
    {#updateorcreatの部分がデータベースに同じアカウントがあればメール認証をされなかった場合にもSNSを通じて認証したらMustVerifyEmailを利用して認証されるようにする
        $user = User::updateOrCreate([
            'email' => $socialUser->getEmail(),
        ], [
            'name' => $socialUser->getName(),
        ]);

        if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return $user;
    }
}
