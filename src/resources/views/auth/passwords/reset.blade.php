@extends('layouts.app')

@section('title','パスワード再設定')

@include('layouts.nav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3 text-dark lighten-4">
                    <i class="fas fa-id-card-alt text-white" style="font-size: 25px"></i>
                    <span class="text-white">パスワード再設定</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="{{ route('password.update') }}" class="p-3 mb-1">
                            @csrf

                            <div style="text-align: initial;">

                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="token" value="{{ $token }}">

                                <!--
                                <div class="md-form">
                                    <label for="email">メールアドレス</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                -->

                                <div class="md-form">
                                    <label for="password">新しいパスワード</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <small>半角英数字8文字以上を入力してください。</small>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label for="password_confirmation">新しいパスワード(確認)</label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                                    <small>確認のためパスワードを再度入力してください。</small>
                                </div>

                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white" title="パスワード再設定" type="submit">
                                送信
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
