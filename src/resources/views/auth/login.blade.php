@extends('layouts.app')

@section('title','ログイン')

@include('commons.header')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-2 shadow-none" style="border-radius: 1rem;">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3" style="border-radius: 1rem 1rem 0 0;">
                    <i class="fas fa-sign-in-alt text-white" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">
                        Login
                    </span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">
                        <form method="POST" action="{{ route('login') }}" class="p-3 mb-1">
                            @csrf

                            <div style="text-align: initial;">

                                <div class="md-form">
                                    <label for="email">
                                        メールアドレス
                                    </label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" required autocomplete="email" value="{{ old('email') }}">
                                    <small>
                                        登録済みのメールアドレスを入力してください。
                                    </small>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label for="password">
                                        パスワード
                                    </label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="current-password">
                                    <small>
                                        登録済みのパスワードを入力してください。
                                    </small>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <input type="hidden" name="remember" id="remember" value="on">

                            <div>
                                パスワードを忘れた方は
                                <a href="{{ route('password.request') }}" class="deep-orange-text">
                                    こちら
                                </a>
                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white shadow-none" title="ログイン" type="submit">
                                ログイン
                                <i class="fas fa-arrow-right text-white"></i>
                            </button>

                            <button class="btn btn-block sunny-morning-gradient rounded-pill mt-4 text-white shadow-none" title="ゲストログイン" type="button" onclick="location.href='{{ route("login.guest") }}'">
                                ゲストログイン
                                <i class="fas fa-arrow-right text-white"></i>
                            </button>

                            <button class="btn btn-block grey lighten-3 rounded-pill mt-4 text-dark shadow-none" title="キャンセル" type="button" onclick="location.href='{{ route("articles.index") }}'">
                                キャンセル
                                <i class="fas fa-arrow-left text-dark"></i>
                            </button>

                            <div class="mt-4">
                                アカウント未登録の方は
                                <a href="{{ route('register') }}" class="deep-orange-text">
                                    こちら
                                </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
