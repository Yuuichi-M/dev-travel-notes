@extends('layouts.app')

@section('title','アカウント作成')

@include('layouts.nav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3 text-dark lighten-4">
                    <i class="far fa-user text-white mr-1" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">Sign Up</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="{{ route('register') }}" class="p-3 mb-1">
                            @csrf
                            <div style="text-align: initial;">
                                <div class="form-group row">
                                    <p class="col-md-12 text-center text-dark mt-1 mb-1">
                                        <span class="text-danger">(※)</span>は入力必須項目です。
                                    </p>
                                </div>

                                <div class="md-form">
                                    <label for="name">名前<span class="text-danger">(※)</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" required value="{{ old('name') }}">
                                    <small>16字以内で入力してください。</small>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="email">メールアドレス<span class="text-danger">(※)</span></label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" required value="{{ old('email') }}">
                                    <small>今回は仮のメールアドレスを入力ください。</small>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="password">パスワード<span class="text-danger">(※)</span></label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required>
                                    <small>半角英数字8文字以上を入力してください。</small>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="password_confirmation">パスワード(確認)<span class="text-danger">(※)</span></label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                                    <small>確認のためパスワードを再度入力してください。</small>
                                </div>
                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white" title="アカウント登録" type="submit">
                                Register
                                <i class="fas fa-arrow-right text-white"></i>
                            </button>

                            <button class="btn btn-block grey lighten-4 rounded-pill mt-4 text-dark" title="戻る" type="button" onclick="location.href='{{ route("articles.index") }}'">
                                <i class="fas fa-arrow-left text-dark"></i>
                                Return
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

@endsection
