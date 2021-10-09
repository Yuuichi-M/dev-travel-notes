<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //記事一覧
    public function index()
    {
        //Modelの全データをコレクションで返す
        //create_atを降順で並び替え
        $articles = Article::all()->sortByDesc('created_at');
        return view('articles.index', ['articles' => $articles]);
    }

    //記事投稿画面
    public function create()
    {
        return view('articles.create');
    }
}
