<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Provider;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     *　ログインフォーム
     */
    public function create(): View
    {
        return view('auth.login', [
            'providers' => Provider::cases(),
        ]);
    }
    /**
     * public function sohwLoginForm()
     * {
     * return view('auth.login');
     * }
     */
    /**
     * ログイン
     */
    public function store(LoginRequest $request): RedirectResponse|JsonResponse
    {
        if (! auth()->attempt($request->validated(), $request->boolean('remember'))) {
            return back()->withErrors([
                'failed' => __('auth.failed'),
            ]);
        }

        if ($request->ajax()) {
            return response()->json(['message' => 'Successfully logged in']);
        }
        #説明ー使用者が使おうとしたページに戻ってくれる機能のintended
        return redirect()->intended();
    }

    /**
     * ログアウト
     */
    public function destroy(): RedirectResponse
    {   #auth-logoutだけでよい、セッションアカウントの再生などが必要だから、以下のコードも入ってる
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
