<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SendResetLinkRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasswordResetController extends Controller
{
    /**
     * 説明ーpasswordを探すリンクに接続するところ元request
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * 元email
     */
    public function store(SendResetLinkRequest $request): RedirectResponse
    {   #passwordを変えるリンクを送れる
        $status = Password::sendResetLink($request->validated());
        #back-withErrorsはviewでエラー処理、back-withの場合は応答しながらセッションにflashmessageを作る方法
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * 元reset,tokenがも終わったtokenだったらpassword再設定はできない
     */
    public function edit(string $token): View
    {
        return view('auth.reset-password', [
            'token' => $token,
        ]);
    }

    /**
     * password再設定
     */
    public function update(ResetPasswordRequest $request): RedirectResponse
    {
        $status = Password::reset($request->validated(), function ($user, $password) {
            #強制的に再設定-forceFill
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        });

        return $status === Password::PASSWORD_RESET
            ? to_route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
