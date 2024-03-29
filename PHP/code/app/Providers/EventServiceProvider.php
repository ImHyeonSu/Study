<?php

namespace App\Providers;

use App\Events\Published;
use App\Events\Subscribed;
use App\Listeners\SendPublishedNotification;
use App\Listeners\SendSubscribedNotification;
use App\Models\Attachment;
use App\Models\Post;
use App\Observers\AttachmentObserver;
use App\Observers\PostObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{#説明ーイベントアラム
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    #イベントが発生した時、以下のclassのが動作する
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Subscribed::class => [
            SendSubscribedNotification::class,
        ],
        Published::class => [
            SendPublishedNotification::class,
        ],
    ];

    /**
     * The model observers to register.
     *説明ーイベント発生のアラムを登録するクラス
     * @var array
     */
    protected $observers = [
        Post::class => PostObserver::class,
        Attachment::class => AttachmentObserver::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
