<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    //マイページ
    public function show(string $name)
    {
        //ユーザーモデル取得($nameと一致するモデル)
        $user = User::where('name', $name)->first();
        //記事モデル取得
        $articles = $user->articles->sortByDesc('id');

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    //ユーザー情報変更画面
    public function edit(string $name)
    {
        //ユーザーモデル取得($nameと一致するモデル)
        $user = User::where('name', $name)->first();

        if ($user->id !== Auth::id()) {
            return redirect('login');
        }

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    //ユーザー情報変更処理
    public function update(UserRequest $request, User $user)
    {
        $user = Auth::user();
        $user->fill($request->all());

        //アバター画像保存処理
        if ($request->has('avatar')) {
            //保存先指定(現在はStorage)
            $fileName = $this->saveAvatar($request->file('avatar'));
            //ファイル名をDBへ保存
            $user->avatar_file_name = $fileName;
        }

        $user->save();

        return redirect()->route('users.show', ["name" => Auth::user()->name])
            ->with('status', 'プロフィールを変更しました。');
    }


    /**
     * アバター画像をリサイズして保存
     *
     * @param UploadedFile $file アップロードされたアバター画像 Intervention Imageのインスタンス生成
     * @return string ファイル名
     */
    private function saveAvatar(UploadedFile $file): string
    {
        //一時ファイルを生成してパスを取得
        $tempPath = $this->makeTempPath();
        //画像をリサイズ(Intervention Image)->一時ファイルに保存
        Image::make($file)->fit(125, 125)->save($tempPath);
        //Storageファサードを使用して画像をディスクに保存
        $filePath = Storage::disk('public')
            ->putFile('avatars', new File($tempPath));

        return basename($filePath);
    }

    /**
     * 一時的なファイルを生成してパスを返します。
     *
     * @return string ファイルパス
     */
    private function makeTempPath(): string
    {
        ///tmpに一時ファイルが生成->ファイルポインタが返る
        $tmp_fp = tmpfile();
        //ファイルのメタ情報を取得(ファイルポインタを指定)
        $meta = stream_get_meta_data($tmp_fp);
        //メタ情報からURI(ファイルのパス)を取得し、返す。
        return $meta["uri"];
    }

    //いいね一覧表示
    public function likes(string $name)
    {
        //ユーザーモデル取得($nameと一致するモデル)
        $user = User::where('name', $name)->first();
        //記事モデル取得
        $articles = $user->likes->sortByDesc('id');

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    //フォロー中のユーザー表示
    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();

        $followings = $user->followings->sortByDesc('id');

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    //フォロワー表示
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers->sortByDesc('id');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    //フォロー機能　フォロー
    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    //フォロー機能　フォロー解除
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
