@extends('layouts.app')

@section('title','投稿')

@include('commons.header')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4 rounded">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3">
                    <i class="fas fa-paper-plane text-white mr-1" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">Post</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="{{ route('articles.store') }}" class="p-3 mb-1" enctype="multipart/form-data">
                            @csrf

                            <div style="text-align: initial;">

                                <div class="form-group row">
                                    <p class="col-md-12 text-center text-dark">
                                        <span class="text-danger">(※)</span>は入力必須項目です。
                                    </p>
                                </div>

                                <div class="image-picker text-center">
                                    <div class="card-text">画像投稿</div>
                                    <input type="file" name="article_img" class="d-none @error('article_img') is-invalid @enderror" accept="image/png,image/jpeg,image/gif" value="{{ old('image_file_name') }}" id="article_img" />
                                    <label for="article_img" class="d-inline-block" role="button">
                                        <img src="/images/image-default.png" style="object-fit: cover; width: 200px; height: 200px;">
                                    </label>
                                    <div class="small">クリックして画像をアップロードできます。</div>

                                    @error('article_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="md-form">
                                    <label for="title">タイトル<span class="text-danger">(※)</span></label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required value="{{ old('title') }}">
                                    <small>100文字以内で入力してください</small>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label for="url">参考URL</label>
                                    <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}">
                                    <small>公式HPや紹介サイト、マップ等のURLを入力してください</small>

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mt-1 mb-3">
                                    <label for="category_id" style="font-size: 16px">所在地</label>
                                    <select name="category_id" class="browser-default custom-select @error('category_id') is-invalid @enderror">
                                        @foreach($prefectures as $prefecture)
                                        <option value="{{ $prefecture->id }}" {{old('category_id') == $prefecture->id ? 'selected' : ''}}>
                                            {{$prefecture->prefecture}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <small>プルダウンよりお選びください</small>
                                </div>

                                @include('articles.tag')

                                <div class="form-group">
                                    <label for="summary"></label>
                                    <textarea name="summary" class="form-control @error('summary') is-invalid @enderror" cols="50" rows="8" name="summary" id="summary" required placeholder="感想をシェアしよう">{{ old('summary') }}</textarea>

                                    @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white" title="投稿" type="submit">
                                POST
                                <i class="fas fa-arrow-right text-white"></i>
                            </button>

                            <button class="btn btn-block grey lighten-4 rounded-pill mt-4 text-dark" title="戻る" type="button" onclick="location.href='{{ route("articles.index") }}'">
                                <i class="fas fa-arrow-left text-dark"></i>
                                Return
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
