<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //タグ別記事詳細画面
    public function show(string $name)
    {
        $tag = Tag::where('name', $name)->first()
            ->load(['articles.user', 'articles.likes', 'articles.tags', 'articles.comments', 'articles.category']);

        return view('tags.show', ['tag' => $tag]);
    }
}
