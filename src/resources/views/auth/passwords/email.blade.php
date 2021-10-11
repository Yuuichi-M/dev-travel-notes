@extends('layouts.app')

@section('title', 'パスワードリセット')

@include('layouts.nav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3 text-dark lighten-4">
                    <i class="fas fa-envelope text-white" style="font-size: 24px"></i>
                    <span class="text-white">RESET PASSWD</span>
                </h4>

                <div class="card-body text-center">

                    <form method="POST" action="{{ route('password.email') }}" class="p-3 mb-1">

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

                        <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white" title="パスワードリセット" type="submit">
                            <i class="far fa-envelope"></i>
                            Send email
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
