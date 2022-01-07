@extends('layouts.app')

@section('title','アカウント作成')

@include('commons.header')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-2 shadow-none" style="border-radius: 1rem;">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3" style="border-radius: 1rem 1rem 0 0;">
                    <i class="fas fa-user-alt text-white mr-1" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">Register</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="{{ route('register') }}" class="p-3 mb-1">
                            @csrf
                            <div style="text-align: initial;">

                                <div class="md-form">
                                    <label for="name">名前<span class="text-danger small">(必須)</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" required value="{{ old('name') }}">
                                    <small>16字以内で入力してください。</small>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="email">メールアドレス<span class="text-danger small">(必須)</span></label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" required value="{{ old('email') }}">
                                    <small>今回は仮のメールアドレスを入力ください。</small>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="password">パスワード<span class="text-danger small">(必須)</span></label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required>
                                    <small>半角英数字8文字以上を入力してください。</small>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="password_confirmation">パスワード(確認)<span class="text-danger small">(必須)</span></label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                                    <small>確認のためパスワードを再度入力してください。</small>
                                </div>
                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white shadow-none" title="アカウント登録" type="submit">
                                はじめる
                                <i class="fas fa-arrow-right text-white"></i>
                            </button>

                            <button class="btn btn-block grey lighten-3 rounded-pill mt-4 text-dark shadow-none" title="戻る" type="button" onclick="location.href='{{ route("articles.index") }}'">
                                戻る
                                <i class="fas fa-arrow-left text-dark"></i>
                            </button>

                        </form>

                        <div>
                            アカウントをお持ちの方は<a href="{{ route('login') }}" class="deep-orange-text">こちら</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="padding-top: 50px;">
    @include('commons.footer')
</div>

@endsection
