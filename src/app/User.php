<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //記事一覧リレーション
    public function articles(): HasMany
    {
        return $this->hasMany('App\Article');
    }

    //ユーザーモデルにリレーション追加
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    //フォロー中またはフォローするユーザーに対するリレーション
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    //いいねした記事へのアクセス
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Article', 'likes')->withTimestamps();
    }

    //ユーザーがフォロー中かどうか判定
    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
    }

    //フォロワーのユーザーモデルを算出
    public function getCountFollowersAttribute(): int
    {
        return $this->followers->count();
    }

    //フォロー中のユーザーモデルを算出
    public function getCountFollowingsAttribute(): int
    {
        return $this->followings->count();
    }
}
