<?php

use Illuminate\Support\Facades\Route;

Route::get('/blogs', \App\Http\Controllers\Dashboard\BlogController::class)
    ->name('blogs');
#最初のコード
#Route::get('/blogs', \App\Http\Controllers\Dashboard\BlogController::class)
#    ->name('dashboard.blogs');    

Route::get('/subscribers', \App\Http\Controllers\Dashboard\SubscriberController::class)
    ->name('subscribers');
#最初のコード
#Route::get('/subscribers', \App\Http\Controllers\Dashboard\SubscriberController::class)
#    ->name('dashboard.subscribers');    
Route::get('/subscriptions', \App\Http\Controllers\Dashboard\SubscriptionController::class)
    ->name('subscriptions');

Route::get('/comments', \App\Http\Controllers\Dashboard\CommentController::class)
    ->name('comments');

Route::get('/tokens', \App\Http\Controllers\Dashboard\TokenController::class)
    ->name('tokens');
