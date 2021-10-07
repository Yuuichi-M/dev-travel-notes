@extends('layouts.app')

@section('title','ログイン')

@include('layouts.nav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4">

                <h2 class="card-header font-weight-bold text-center border-bottom pb-4 pt-4 text-dark lighten-5">
                    <a class="text-decoration-none" title="アカウント作成" href="{{ route('register') }}">
                        <i class="fas fa-sign-in-alt deep-orange-text" style="font-size: 38px"></i>
                        <span class="text-dark">ログイン</span>
                    </a>
                </h2>

                <div class="card-body text-center">
                    <div class="card-text">
                        <form method="POST" action="{{ route('login') }}">
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

                            <button class="btn btn-block mt-3 mb-3 btn-deep-orange text-white" title="ログイン" type="submit">ログイン</button>

                        </form>

                        <div class="mt-1 mb-1">
                            アカウント登録は<a href="{{ route('register') }} class=" card-text">こちら</a>から
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
