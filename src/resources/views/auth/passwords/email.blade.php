@extends('layouts.app')

@section('title', 'パスワードリセット')

@include('layouts.nav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4">

                <h2 class="card-header font-weight-bold text-center border-bottom pb-4 pt-4 text-dark lighten-5">
                    <a class="text-decoration-none" title="パスワード再設定" href="{{ route('password.request') }}">
                        <i class="fas fa-envelope deep-orange-text" style="font-size: 38px"></i>
                        <span class="text-dark">パスワードを忘れた方</span>
                    </a>
                </h2>

                <div class="card-body text-center">

                    <form method="POST" action="{{ route('password.email') }}" class="p-3">

                        @if (session('status'))
                        <div class="card-text alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @csrf

                        <div class="md-form">
                            <label for="email">メールアドレス</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button class="btn btn-block mt-3 mb-4 btn-deep-orange text-white" title="メール送信" type="submit">
                            メール送信
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
