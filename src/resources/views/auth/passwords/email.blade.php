@extends('layouts.app')

@section('title', 'パスワード再設定メール送信')

@include('commons.header')

@section('content')

<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-2 shadow-none" style="border-radius: 1rem;">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3" style="border-radius: 1rem 1rem 0 0;">
                    <i class="fas fa-envelope text-white mr-1" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">Send E-mail</span>
                </h4>

                <div class="card-body text-center">

                    <form method="POST" action="{{ route('password.email') }}" class="p-3 mb-1">

                        @if (session('status'))
                        <div class="card-text alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @csrf

                        <div class="card-text" style="text-align: initial;">

                            <div class="md-form">
                                <label for="email">メールアドレス</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <small>登録済みのメールアドレスを入力してください。</small>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                        </div>

                        <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white shadow-none" title="メール送信" type="submit">
                            送信
                            <i class="fas fa-arrow-right"></i>
                        </button>

                        <button class="btn btn-block grey lighten-3 rounded-pill mt-4 text-dark shadow-none" title="戻る" type="button" onclick="location.href='{{ route("articles.index") }}'">
                            戻る
                            <i class="fas fa-arrow-left text-dark"></i>
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
