<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#説明ーphp artisan route:listを通じてAPI状況を確認できる 
Route::get('/', \App\Http\Controllers\WelcomeController::class);
/*最初のコード
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/search', \App\Http\Controllers\SearchController::class)
    ->name('search');

Route::resource('blogs', \App\Http\Controllers\BlogController::class);
#DBのつくりー＞web.phpにAPIの設定、requestの作り
Route::controller(\App\Http\Controllers\SubscribeController::class)->group(function () {
    Route::post('subscribe', 'store')#Route::post('subscribe', 'subscribe')
        ->name('subscribe');
    Route::post('unsubscribe', 'destroy')#Route::post('unsubscribe', 'unsubscribe')
        ->name('unsubscribe');
});
#以下のようにblogs.postsを宣言することに通じてblogs/{blogs}/posts,blogs/{blogs}/posts/{post}みたいにルートが設定される
#309ページを参考する
Route::resource('blogs.posts', \App\Http\Controllers\PostController::class)
    ->shallow();

Route::resource('posts.comments', \App\Http\Controllers\CommentController::class)
    ->shallow()
    ->only(['store', 'update', 'destroy']);

Route::resource('posts.attachments', \App\Http\Controllers\AttachmentController::class)
    ->shallow()
    ->only(['store', 'destroy']);
