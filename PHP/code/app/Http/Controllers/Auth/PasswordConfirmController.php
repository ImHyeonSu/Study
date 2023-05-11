<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordConfirmRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordConfirmController extends Controller
{
    /**
     * 説明ーpassword確認フォーム、元showPasswordConfirmationForm
     */
    public function create(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * password確認、元comfirm
     */
    public function store(PasswordConfirmRequest $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        #hashcheckを利用して暗証番号が同じかどうかを確認
        if (! Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->passwordConfirmed();

        return redirect()->intended();
    }
}
