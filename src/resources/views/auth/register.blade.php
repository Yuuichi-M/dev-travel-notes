@extends('layouts.app')

@section('title','アカウント作成')

@include('layouts.nav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4">
                <h2 class="card-header font-weight-bold text-center border-bottom pb-4 pt-4 text-dark lighten-5">
                    <i class="fas fa-user-circle deep-orange-text mr-1" style="font-size: 35px"></i>アカウント作成
                </h2>
                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div style="text-align: initial;">
                                <div class="form-group row">
                                    <p class="col-md-12 text-center text-dark mt-2">
                                        <span class="text-danger">(※)</span>は入力必須項目です。
                                    </p>
                                </div>

                                <div class="md-form">
                                    <label for="name">名前<span class="text-danger">(※)</span></label>
                                    <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                                    <small>16字以内で入力してください。</small>
                                </div>

                                <div class="md-form">
                                    <label for="email">メールアドレス<span class="text-danger">(※)</span></label>
                                    <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}">
                                    <small>今回は仮のメールアドレスを入力ください。</small>
                                </div>

                                <div class="md-form">
                                    <label for="password">パスワード<span class="text-danger">(※)</label>
                                    <input class="form-control" type="password" id="password" name="password" required>
                                    <small>半角英数字8文字以上を入力してください。</small>
                                </div>

                                <div class="md-form">
                                    <label for="password_confirmation">パスワード(確認)<span class="text-danger">(※)</label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                                    <small>確認のためパスワードを再度入力してください。</small>
                                </div>

                                <div class="form-group">
                                    <label for="avatar" style="font-size: 16px">プロフィール画像</label>
                                    <input class="form-control-file ml-3" type="file" id="avatar" name="name" accept="image/jpeg, image/png, image/jpg, image/gif">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="self_introduction float-left" style="font-size: 16px">自己紹介</label>
                                    <textarea class="form-control" name="self_introduction" id="self_introduction" cols="50" rows="6" placeholder="自由に自己紹介文を書きましょう（^o^）&#13;&#10;（後から変更可能です）">{{ old('self_introduction') }}</textarea>
                                </div>
                                <p class="small">255字以内で入力してください。</p>
                            </div>
                            <button class="btn btn-block mt-3 mb-3 btn-deep-orange text-white" type="submit">はじめる</button>

                        </form>

                        <div class="mt-0">
                            <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
