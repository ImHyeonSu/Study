<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Provider;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * 会員登録フォーム
     */
    public function create(): View
    {
        return view('auth.register', [
            'providers' => Provider::cases(),
        ]);
    }

    /**
     * 会員登録
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {#register.blada.phpからsubmitしたらこれが動作
        $user = User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        event(new Registered($user));

        return to_route('verification.notice');
    }
}
 /*public function register(Reqeust $request)
    {
        $request->validate([
        'name' => 'required|max:255', or ['required','max:255']
        'email' => 'required|email|unique:users|max:255', ['required','email','unique:users','max:255']
        'password' => 'required|max:255', ['required','max:255']
        ])
    }
    or use Illuminate\Support\Facades\Validator;
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|max:255',

        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
    $validated = $validator->validated();
    ])
    or
    $request->validate([
        'password' => 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
    ]);
    or
    use App\Rules\Password as PasswordRule;
    $request->validate([
        'password' =>[new PasswordRule()]
    ]);
    */
    # 説明ー上のregisterClassはRegisterUserRequest.phpから有標性検査を行ってるときは使わなくてもいい