<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * 説明ーphp artisan make:observer PostObserver --model=Post
     * modelから発生するイベントをクラスで管理する
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        $post->comments()->forceDelete();
    }
}
