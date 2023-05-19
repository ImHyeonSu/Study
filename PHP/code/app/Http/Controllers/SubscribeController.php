<?php

namespace App\Http\Controllers;

use App\Events\Subscribed;
use App\Http\Requests\SubscribeRequest;
use App\Http\Requests\UnsubscribeRequest;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;

class SubscribeController extends Controller
{
    /**
     * サブスクリプション
     */
    public function store(SubscribeRequest $request): RedirectResponse
    {   #説明ーuser_idはサブスクライバー、blog_idは主人
        /** @var \App\Models\User $user */
        $user = $request->user();
        /** @var \App\Models\Blog $blog */
        $blog = Blog::find($request->blog_id);

        $user->subscriptions()->attach($blog->id);

        event(new Subscribed($user, $blog));

        return back();
    }

    /**
     * サブスクリプションキャンセル
     */
    public function destroy(UnsubscribeRequest $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        /** @var \App\Models\Blog $blog */
        $blog = Blog::find($request->blog_id);

        $user->subscriptions()->detach($blog->id);

        return back();
    }
}
