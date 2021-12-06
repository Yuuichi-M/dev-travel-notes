<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use softdeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'article_id', 'user_id', 'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}
