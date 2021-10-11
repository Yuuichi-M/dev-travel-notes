<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use softdeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'category_id', 'summary', 'url'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
