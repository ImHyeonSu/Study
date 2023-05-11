<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Enums\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Mockery\MockInterface;
use Tests\TestCase;

#説明ーsocial loginのテストのためにはmockingを使う。メソッド、pasadeを呼び出さなくて回答のテストができる
#mockはsimulationはふりをテストすること。
class SocialLoginControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testRedirectToProvider(): void
    {#この部分はただredirectだからmockがいらない
        $provider = Provider::Github;

        /** @see \Laravel\Socialite\Two\GithubProvider::getAuthUrl() */
        $this->get(route('login.social', $provider))
            ->assertRedirectContains('https://github.com/login/oauth/authorize');
    }

    public function testSocialLoginAndUpdateOrCreateUser(): void
    {
        $provider = Provider::Github;

        $data = [
            'email' => $this->faker->safeEmail(),
            'name' => $this->faker->name(),
        ];

        $socialUser = $this->mock(SocialiteUser::class, function (MockInterface $mock) use ($data) {
            #mockしてるところ上で準備した偽赤を入れる
            $mock->shouldReceive('getEmail')
                ->andReturn($data['email']);
            $mock->shouldReceive('getName')
                ->andReturn($data['name']);
        });

        Socialite::shouldReceive('driver->user')
            ->once()
            ->andReturn($socialUser);

        $this->get(route('login.social.callback', $provider))
            ->assertRedirect();

        $this->assertEquals(
            session()->socialite($provider), $socialUser->getEmail()
        );

        $this->assertAuthenticated();

        $this->assertDatabaseHas('users', $data);
    }
}
