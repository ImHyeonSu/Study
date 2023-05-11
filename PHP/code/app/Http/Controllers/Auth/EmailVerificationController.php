<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationController extends Controller
{
    /**
     * メール認証できなかったとき
     */
    public function create(): View
    {
        return view('auth.verify-email');
    }

    /**
     * メール認証再送
     */
    public function store(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $user->sendEmailVerificationNotification();

        return back();
    }

    /**
     * メール認証
     */
    #説明ーEmailVerificationRequestはauthorize-権限,rules-有標性検査, withValidator-有標性検査前に呼ばれて有標性検査入れる 
    public function update(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
