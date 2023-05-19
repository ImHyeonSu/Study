<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * BlogController
     */
    public function __construct()
    {
        #説明ー以下のコードを通じてpolicyが適用されるーBlogpolicy
        $this->authorizeResource(Blog::class, 'blog');
    }

    /**
     * GET
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('blogs.index', [
            #説明ー以下のように全部呼び出したら効率的じゃない
            #php artisan vendor:publish --tag=laravel-pagination
            #'blogs'=> Blog::all()
            'blogs' => Blog::with('user')->paginate(5),
        ]);
    }

    /**
     * GET
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('blogs.create');
    }

    /**
     * POST
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $user->blogs()->create($request->validated());

        return to_route('dashboard.blogs');
    }

    /**
     * GET
     * Display the specified resource.
     */
    public function show(Request $request, Blog $blog): View
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        return view('blogs.show', [
            #以下のようにblogと$blogになったら、implicit bindingでいう機能が作動
            #show.blade.phpから渡された$blogの値がURLに入ってblogs/~~~でいうURLになる
            'blog' => $blog,
            'owned' => $user->blogs()->find($blog->id),
            'subscribed' => $blog->subscribers()->find($user->id),
            'posts' => $blog->posts()->latest()->paginate(5),
        ]);
        # return view('blogs.show', [
        #    'blog' => $blog        ]);
    }

    /**
     * GET
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {
        return view('blogs.edit', [
            'blog' => $blog->load([
                'comments.user',
                'comments.commentable',
            ]),
        ]);
        # return view('blogs.edit', [
        #    'blog' => $blog        ]);
        #  blogのidが同じかを確認してるコードを呼び出して確認するコード
        #  if(! Gate::allows('update-blog', $blog)){
        #  abort(403);} or Gate::authorize('update-blog',$blog);
        # superuserの場合　
        # Gate::before(function ($user, $ability){
        # if ($user->isAdministrator()){return user;}   
        #});     
        
    }

    /**
     * PUT/FETCH
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog): RedirectResponse
    {
        $blog->update($request->validated());

        return to_route('dashboard.blogs');
    }

    /**
     * DELETE
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return to_route('dashboard.blogs');
    }
}
