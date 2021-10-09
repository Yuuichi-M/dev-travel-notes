@extends('layouts.app')

@section('title','ログイン')

@include('layouts.nav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3 text-dark lighten-4">
                    <i class="fas fa-sign-in-alt text-white" style="font-size: 25px"></i>
                    <span class="text-white">ログイン</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">
                        <form method="POST" action="{{ route('login') }}" class="p-3 mb-1">
                            @csrf

                            <div class="md-form">
                                <label for="email">メールアドレス</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" required autocomplete="email" value="{{ old('email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="md-form">
                                <label for="password">パスワード</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <input type="hidden" name="remember" id="remember" value="on">

                            <div>
                                パスワードを忘れた方は<a href="{{ route('password.request') }}">こちら</a>
                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-3 text-white" title="ログイン" type="submit">
                                ログイン
                            </button>

                        </form>

                        <div>
                            アカウント未登録の方は<a href="{{ route('register') }}">こちら</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
