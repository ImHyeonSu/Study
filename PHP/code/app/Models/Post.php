<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property int $blog_id
 * @property Blog $blog
 * @property \Illuminate\Database\Eloquent\Collection $attachments
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read int|null $attachments_count
 * @property-read int|null $comments_count
 *
 * @method static \Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * ブログ
     */
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * 説明ーコメント、Comment.phpからの
     *
     * @return mixed
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->withTrashed();
    }

    /**
     * 添付ファイル
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}

/**protected static function booted()
{
    self::deleted(function (Post $post){
        $post->comments()->forceDelete();
    });
}
or
   protected $dispatchesEvents = [
        'deleted' => PostDeleted::class
   ]
    書きとコメント全部削除のコード
*/
