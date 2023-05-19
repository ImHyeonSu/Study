<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    /**
     * CommentController
     */
    public function __construct()
    {   #説明ーコメントの削除ができるようにするコード
        $this->authorizeResource(Comment::class, 'comment');
    }

    /**
     * コメント追加
     */
    public function store(StoreCommentRequest $request, Post $post): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $comment = $user->comments()->make($request->validated());

        $post->comments()->save($comment);

        return back();
    }

    /**
     * コメント修正
     */
    public function update(UpdateCommentRequest $request, Comment $comment): RedirectResponse
    {
        $comment->update($request->validated());

        return back();
    }

    /**
     * コメント削除
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return back();
    }
}
