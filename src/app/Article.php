<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use softdeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'category_id', 'summary', 'image_file_name',
    ];

    //記事一覧　1対多
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    //いいね機能　多対多のリレーション
    public function likes(): BelongsToMany
    {
        //(モデル,　中間テーブル)
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    //いいね機能　認証確認 いいね済みかどうか判定(isLikedBy)
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    //いいね機能　いいねされた数のカウント
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    //記事モデルとタグモデルのリレーション 多対多
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    //所在地表示
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //コメント機能
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
