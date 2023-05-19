<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Blog;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * PostController
     */
    #コンストラクタの認証政策を適用する
    public function __construct(private readonly PostService $postService)
    {
        $this->authorizeResource(Post::class, 'post', [
            'except' => ['create', 'store'],
        ]);

        $this->middleware('can:create,App\Models\Post,blog')
            ->only(['create', 'store']);
    }

    /**
     * 書き物一覧
     */
    public function index(Blog $blog): View
    {
        return view('blogs.posts.index', [
            'posts' => $blog->posts()->latest()->paginate(),
        ]);
    }

    /**
     * 書きフォーム
     */
    public function create(Blog $blog): View
    {
        return view('blogs.posts.create', [
            'blog' => $blog,
        ]);
    }

    /**
     * 書く
     */
    public function store(StorePostRequest $request, Blog $blog): RedirectResponse
    {
        $post = $this->postService->store($request->validated(), $blog);

        #最初のコード$post = $this->posts()->create($request->only(['title', 'content']));
        #ファイル添付が追加されたコード
        #$this->attachments($request, $post);
        return to_route('posts.show', $post);
    }

    /**
     * 書き物読み
     */
    public function show(Request $request, Post $post): View
    {
        return view('blogs.posts.show', [
            'post' => $post->loadCount('comments'),
            'comments' => $post->comments()
                #doesntHaveは関係が設定されたDBのデータのなかでparentだけのデータを呼び出す。
                #子データはrepliesとして呼ぶ
                ->doesntHave('parent')
                ->with(['user', 'replies.user'])
                ->get(),
        #最初のコードreturn view('blogs.posts.show',['post'=>$post]);
        /**二番目のコード
         *  $user = $request->user();
         * 
         *  return view('blogs.show',['post'=>$blog->posts()->latest()->paginate(5)]);
         * */   

        ]);
    }

    /**
     * 修正フォーム
     */
    public function edit(Post $post): View
    {
        return view('blogs.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * 修正
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $this->postService->update($request->validated(), $post);
        #最初のコード$post->update($request->only(['title', 'content']));
        #ファイル添付が追加されたコード
        #$this->attachments($request, $post);
        return to_route('posts.show', $post);
    }

    /**
     * 削除
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->postService->destroy($post);

        return to_route('blogs.posts.index', $post->blog);
    }
}

/**
 * private function attachments(Request $request, $post)
 * {
 *      if ($reuqest->hasFile('attachments')){
 *          app(AttachmentController::class)->store($request, $post);          
 * }
 * 
 * }
 */