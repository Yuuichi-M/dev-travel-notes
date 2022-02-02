<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //タグ別記事詳細画面
    public function show(string $name)
    {
        //投稿記事取得, N+1問題解消
        $tag = Tag::where('name', $name)->first()
            ->load(['articles.user', 'articles.likes', 'articles.tags', 'articles.comments', 'articles.category']);

        return view('tags.show', ['tag' => $tag]);
    }
}
