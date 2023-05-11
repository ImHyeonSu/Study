<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{#説明ーmiddlewareの場合は親クラスにhandleが定義されてる、子クラスにはredirectTo()メソッドが存在する
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @codeCoverageIgnore
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
