<?php

namespace App\Models;

use App\Castables\Link; #最初のコード App\Casts\Link
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Attachment
 *
 * @property int $id
 * @property string $original_name
 * @property string $name
 * @property \App\Castables\Link $link
 * @property int $post_id
 * @property \App\Models\Post $post
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @method static \Database\Factories\AttachmentFactory factory($count = null, $state = [])
 * @method static Builder|Attachment newModelQuery()
 * @method static Builder|Attachment newQuery()
 * @method static Builder|Attachment query()
 * @method static Builder|Attachment whereCreatedAt($value)
 * @method static Builder|Attachment whereId($value)
 * @method static Builder|Attachment whereName($value)
 * @method static Builder|Attachment whereOriginalName($value)
 * @method static Builder|Attachment wherePostId($value)
 * @method static Builder|Attachment whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
#説明ーphp artisan make:model Attachment -m -f -r --policy　-m=migration -f=model factory -r=policy
#ララベルのストレージ
class Attachment extends Model
{
    use HasFactory, Prunable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'original_name',
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'link' => Link::class,
    ];

    /**
     * Get the prunable model query.
     */
    public function prunable(): Builder
    {   #書きが削除されたときとか以下を確認してファイルを削除を判明する
        return static::whereNull('post_id');
    }

    /**
     * Prepare the model for pruning.
     */
    public function pruning(): void
    {
        Storage::disk('public')->delete($this->name);
    }

    /**
     * 書き
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
/**
 *説明ーほかの言語のgetterを示している、ぜひAttributeを返還しないといけない
 * public function external(): Attribute
 * {
 *      return Attribute::make(
 *          get: fn () => preg_match('/^https?/',$this->name)
 *      )
 * }
 * 
 * public function link(): Attribute
 * {
 *      return Attribute::make(get: function ($value){
 *         #$thisに値が張ってたらそのままそれを返還externalからもらえなかったらストレージ内の名を返還
 *         $path = $this->external ? $this->name : Storage::disk('public')->url($this->name);　
 *          
 *          return $value ?? $path; $valueに値が入ってるのか確認してあったらそれを返還、それじゃなければ$pathを返還
 *          },
 *          set: fn ($value) => $value
 *          );
 * }
 * 
 */