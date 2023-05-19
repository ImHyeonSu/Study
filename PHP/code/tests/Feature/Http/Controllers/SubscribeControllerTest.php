<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\Subscribed;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class SubscribeControllerTest extends TestCase
{#説説ーサブスクリプションのテスト
    use RefreshDatabase;

    public function testUserSubscribeBlog(): void
    {
        //Mail::fake();
        //Notification::fake();
        Event::fake();
        
        $user = User::factory()->create();
        $blog = Blog::factory()->create();

        $this->actingAs($user)
            ->post(route('subscribe'), [
                'blog_id' => $blog->id,
            ])
            ->assertRedirect();
        #userはサブスクリプションを、blogはサブスクライバーを登録
        $this->assertCount(1, $user->subscriptions);
        $this->assertCount(1, $blog->subscribers);

        $this->assertDatabaseHas('blog_user', [
            'user_id' => $user->id,
            'blog_id' => $blog->id,
        ]);

        Event::assertDispatched(Subscribed::class);
        //Notification::assertSentTo($blog->user, SubscribedNotification::class);
        //Mail::assertQueued(SubscribedMailable::class);
    }

    public function testUserUnsubscribeBlog(): void
    {
        $user = User::factory()->create();
        #事前にサブスクリプションしたユーザーとして登録
        $blog = Blog::factory()->hasAttached(
            factory: $user,
            relationship: 'subscribers'
        )->create();
        #サブスクリプションをきる
        $this->actingAs($user)
            ->post(route('unsubscribe'), [
                'blog_id' => $blog->id,
            ])
            ->assertRedirect();
        #DBから情報があるかどうかを確認することだけで終了
        $this->assertDatabaseMissing('blog_user', [
            'user_id' => $user->id,
            'blog_id' => $blog->id,
        ]);
    }
}
