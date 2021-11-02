@extends('layouts.app')

@section('title','プロフィール変更')

@include('layouts.nav')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4 rounded">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3">
                    <i class="fas fa-edit text-white" style="font-size: 24px"></i>
                    <span class="text-white">PROFILE EDIT</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="" class="p-3 mb-1">
                            @method('PATCH')
                            @csrf

                            <div style="text-align: initial;">

                                <div class="form-group row">
                                    <p class="col-md-12 text-center text-dark">
                                        <span class="text-danger">(※)</span>は入力必須項目です。
                                    </p>
                                </div>

                                <div class="md-form">
                                    <label for="name">名前<span class="text-danger">(※)</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" required value="{{ $user->name ?? old('name') }}">
                                    <small>16字以内で入力してください。</small>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="email">メールアドレス<span class="text-danger">(※)</span></label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" required value="{{ $user->email ?? old('email') }}">
                                    <small>今回は仮のメールアドレスを入力ください。</small>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="self_introduction"></label>
                                    <textarea name="self_introduction" class="form-control @error('self_introduction') is-invalid @enderror" cols="50" rows="8" name="self_introduction" id="self_introduction" required placeholder="自己紹介を書こう">{{ $user->self_introduction ?? old('self_introduction') }}</textarea>

                                    @error('self_introduction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white" title="更新" type="submit">
                                <i class="far fa-arrow-alt-circle-right text-white"></i>
                                update
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
