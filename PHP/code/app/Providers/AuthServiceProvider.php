<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\Users;
use App\Models\Blog;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{#説明ーGateの作成先
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        #BlogPolicy.phpに関したコード
        Blog :: class => BlogPolicy::class
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        #blogのidが同じかを確認してるコード
        #Gate::define('update-blog',function(User $user, Blog $blog){
        #    return $user->id === $blog->user_id;
        #});
        //
    }
}
/**
 * update,delteなどはモデルインスタンスを入れるけど、createみたいな場合はモデルインスタンスクラスを入れたら
 * 大丈夫
 * Controller Method
 * $request->user()->can('update',$blog);
 * $request->user()->can('create',$\App\Models\Blog::class);
 * $this->authoirze('update',$blog);
 * $this->authoirze('create',\$\App\Models\Blog::class);
 * 
 * Controller Constructor
 * $this->authorizeResource(Blog::class, 'blog');
 * 
 * Blade
 * @can('update',$blog)
 * 
 * Middleware
 * Route::put('/blogs/{blog}',function(Blog $blog){})->middleware('can:update','blog');
 * Route::put('/blogs/{blog}',function(Blog $blog){})->can('update','blog');
 * Route::pug('/blogs',function(){})->middleware('can:create','App\Models\Blog');
 * Route::pug('/blogs',function(){})->can('create','App\Models\Blog');
 */