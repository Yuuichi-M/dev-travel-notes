<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Article;
use App\Tag;
use App\User;
use App\Comment;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    //一覧
    public function index()
    {
        //n+1問題解消　create_atを降順で並び替え　ページネーション9
        $articles = Article::with('user')->orderBy('id', 'desc')->paginate(9);
        //category　n+1問題解消
        $categories = Article::with('category')->limit(5)->get();
        //カテゴリー取得
        $prefectures = Category::orderBy('sort_no')->get();
        return view('articles.index', compact('articles', 'categories'))->with('prefectures', $prefectures);
    }

    //投稿画面
    public function create()
    {
        //所在地取得
        $prefectures = Category::orderBy('sort_no')->get();
        //すべてのタグ情報取得(自動補正用)
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.create', [
            'allTagNames' => $allTagNames,
        ])->with('prefectures', $prefectures);
    }

    //投稿機能
    public function store(ArticleRequest $request, Article $article)
    {
        $article->user_id = Auth::id();
        $article->fill($request->all());

        //投稿画像保存処理
        if ($request->has('article_img')) {
            //保存先指定(現在はStorage)
            $fileName = $this->saveImage($request->file('article_img'));
            //ファイル名をDBへ保存
            $article->image_file_name = $fileName;
        }

        $article->save();

        //タグ登録
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index')
            ->with('status', '投稿しました。');
    }

    /**
     * 商品画像をリサイズして保存します
     *
     * @param UploadedFile $file アップロードされた商品画像
     * @return string ファイル名
     */
    private function saveImage(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();

        Image::make($file)->fit(630, 630)->save($tempPath);

        $filePath = Storage::disk('public')
            ->putFile('article_img', new File($tempPath));

        return basename($filePath);
    }

    /**
     * 一時的なファイルを生成してパスを返します。
     *
     * @return string ファイルパス
     */
    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta   = stream_get_meta_data($tmp_fp);
        return $meta["uri"];
    }

    //投稿編集画面
    public function edit(Article $article)
    {
        $prefectures = Category::orderBy('sort_no')->get();
        //タグ取得
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });
        //すべてのタグ情報を取得(自動補正用)
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ])->with('prefectures', $prefectures);
    }

    //投稿編集処理
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());

        //投稿画像保存処理
        if ($request->has('article_img')) {
            //保存先指定(現在はStorage)
            $fileName = $this->saveImage($request->file('article_img'));
            //ファイル名をDBへ保存
            $article->image_file_name = $fileName;
        }

        $article->save();

        //登録タグ編集
        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index')
            ->with('status', '投稿修正しました。');
    }

    //投稿記事削除
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')
            ->with('status', '投稿削除しました。');
    }

    //記事詳細画面
    public function show(Article $article)
    {
        $prefectures = Category::orderBy('sort_no')->get();
        return view('articles.show', ['article' => $article])->with('prefectures', $prefectures);
    }

    //いいね機能　いいね
    public function like(Request $request, Article $article)
    {
        //detachで先に削除(重複防止)
        $article->likes()->detach($request->user()->id);
        //attachで新規登録
        $article->likes()->attach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }

    //いいね機能　いいね解除
    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
}
