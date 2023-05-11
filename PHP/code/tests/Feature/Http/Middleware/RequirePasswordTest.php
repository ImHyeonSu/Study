<?php

namespace Tests\Feature\Http\Middleware;

use App\Enums\Provider;
use App\Http\Middleware\RequirePassword;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class RequirePasswordTest extends TestCase
{
    #説明ーphp artisan make:test Http\\Middleware\\RequirePasswordTestを実行する
    use WithFaker;

    public function testRequirePasswordRedirect(): void
    {#この関数ではセッションを持ってない使用者のredirect返還されたのを確認するredirectされたら302が出てくるのでそれを確認
        /** @var \App\Http\Middleware\RequirePassword $requirePasswordMiddleware */
        $requirePasswordMiddleware = app(RequirePassword::class);

        /** @var \Illuminate\Http\Request $request */
        $request = app(Request::class);
        $request->setLaravelSession(app(Session::class));

        $response = $requirePasswordMiddleware->handle($request, function () {
        });

        $this->assertEquals($response->getStatusCode(), 302);
    }

    public function testRequirePasswordDoesNotRedirect(): void
    {#この変数はセッション持ちのredirectが必要じゃない場合を確認
        /** @var \App\Http\Middleware\RequirePassword $requirePasswordMiddleware */
        $requirePasswordMiddleware = app(RequirePassword::class);

        /** @var \Illuminate\Http\Request $request */
        $request = app(Request::class);
        $request->setLaravelSession(app(Session::class));
        $request->session()->socialite(Provider::Github, $this->faker->safeEmail());

        $response = $requirePasswordMiddleware->handle($request, function () {
        });

        $this->assertEquals($response, null);
    }
}
