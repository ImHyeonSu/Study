<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Comment::class, 'parent_id')
                ->nullable()
                ->constrained('comments')
                ->cascadeOnDelete();
            #説明ー多形性、これを通じてcommentable_type,commentable_idを作る
            #書きを削除してもコメントはDBに残っている
            $table->morphs('commentable');
            $table->text('content');
            $table->timestamps();
            #ソフト削除、deletead_atを作る
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
