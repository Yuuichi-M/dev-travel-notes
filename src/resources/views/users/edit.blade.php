@extends('layouts.app')

@section('title','プロフィール変更')

@include('commons.header')

@section('content')

<div class="container">

    <div class="row justify-content-center mb-2">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-2 shadow-none" style="border-radius: 1rem;">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3" style="border-radius: 1rem 1rem 0 0;">
                    <i class="fas fa-user-edit text-white mr-1" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">Edit Profile</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" class="p-3 mb-1" action="{{ route('users.update', ["name" => Auth::user()->name] )}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div style="text-align: initial;">

                                @if (Auth::id() == 3)
                                <div class="form-group row text-danger">
                                    <p class="col-md-12 text-center text-dark">
                                        <span class="text-danger guest-operation">※ゲストユーザーはプロフィール画像のみ編集できます。</span>
                                    </p>
                                </div>
                                @endif

                                <div class="avatar-form image-picker text-center">
                                    <input type="file" name="avatar" class="d-none @error('avatar') is-invalid @enderror" accept="image/png,image/jpeg,image/gif" value="{{ old('avatar_file_name') }}" id="avatar" />
                                    <label for="avatar" class="d-inline-block">
                                        @if (!empty($user->avatar_file_name))
                                        <img src="{{ asset('https://portfolio-sns-backet.s3.ap-northeast-1.amazonaws.com/avatars/' . $user->avatar_file_name) }}" class="rounded-circle" style="object-fit: cover; width: 125px; height: 125px;">
                                        @else
                                        <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 125px; height: 125px;">
                                        @endif
                                    </label>
                                    <div class="small">プロフィール画像をアップロードできます。</div>

                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="name">名前<span class="text-danger small">(必須)</span></label>

                                    @if (Auth::id() == 3)

                                    <input class="form-control" type="text" id="name" name="name" required value="{{ $user->name }}" readonly>
                                    <small>16字以内で入力してください。</small>

                                    @else

                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" required value="{{ $user->name ?? old('name') }}">
                                    <small>16字以内で入力してください。</small>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @endif

                                </div>

                                <div class="md-form">
                                    <label for="email">メールアドレス<span class="text-danger small">(必須)</span></label>

                                    @if (Auth::id() == 3)

                                    <input class="form-control" type="text" id="email" name="email" required value="{{ $user->email }}" readonly>
                                    <small>メールアドレスを入力ください。</small>

                                    @else

                                    <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" required value="{{ $user->email ?? old('email') }}">
                                    <small>メールアドレスを入力ください。</small>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @endif

                                </div>

                                <div class="form-group">
                                    <label for="self_introduction"></label>

                                    @if (Auth::id() == 3)

                                    <textarea name="self_introduction" class="form-control" cols="50" rows="8" name="self_introduction" id="self_introduction" required placeholder="自己紹介を書こう" readonly>{{ $user->self_introduction }}</textarea>

                                    @else

                                    <textarea name="self_introduction" class="form-control @error('self_introduction') is-invalid @enderror" cols="50" rows="8" name="self_introduction" id="self_introduction" required placeholder="自己紹介を書こう">{{ $user->self_introduction ?? old('self_introduction') }}</textarea>

                                    @error('self_introduction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @endif

                                </div>
                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white shadow-none" title="更新" type="submit">
                                更新
                                <i class="fas fa-arrow-right text-white"></i>
                            </button>

                            <button class="btn btn-block grey lighten-3 rounded-pill mt-4 text-dark shadow-none" title="戻る" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                                戻る
                                <i class="fas fa-arrow-left text-dark"></i>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
