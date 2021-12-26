@extends('layouts.app')

@section('title','パスワード再設定')

@include('commons.header')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-2 shadow-none" style="border-radius: 1rem;">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3" style="border-radius: 1rem 1rem 0 0;">
                    <i class="fas fa-key text-white mr-1" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">Reset Password</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="{{ route('password.update') }}" class="p-3 mb-1">
                            @csrf

                            <div style="text-align: initial;">

                                <input type="hidden" name="email" value="{{ $email }}">
                                <input type="hidden" name="token" value="{{ $token }}">

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

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white shadow-none" title="パスワード再設定" type="submit">
                                パスワード再設定
                                <i class="fas fa-arrow-right text-white"></i>
                            </button>

                            <button class="btn btn-block grey lighten-4 rounded-pill mt-4 text-dark shadow-none" title="キャンセル" type="button" onclick="location.href='{{ route("articles.index") }}'">
                                キャンセル
                                <i class="fas fa-backspace text-dark"></i>
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
