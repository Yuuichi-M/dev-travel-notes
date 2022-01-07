@extends('layouts.app')

@section('title','投稿')

@include('commons.header')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-2 shadow-none" style="border-radius: 1rem;">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3" style="border-radius: 1rem 1rem 0 0;">
                    <i class="fas fa-paper-plane text-white mr-1" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">Post</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="{{ route('articles.store') }}" class="p-3 mb-1" enctype="multipart/form-data">
                            @csrf

                            <div style="text-align: initial;">

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
                                    <label for="title">タイトル<span class="text-danger small">(必須)</span></label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required value="{{ old('title') }}">
                                    <small>50文字以内で入力してください</small>

                                    @error('title')
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
                                    <label for="summary"><span class="text-danger small">(必須)</span></label>
                                    <textarea name="summary" class="form-control @error('summary') is-invalid @enderror" cols="50" rows="8" name="summary" id="summary" required placeholder="感想をシェアしよう ※10000文字以内">{{ old('summary') }}</textarea>

                                    @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white shadow-none" title="投稿" type="submit">
                                投稿
                                <i class="fas fa-arrow-right text-white"></i>
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
</div>

<div class="pt-3">
    @include('commons.footer')
</div>

@endsection
