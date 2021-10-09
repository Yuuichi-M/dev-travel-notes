@extends('layouts.app')

@section('title','投稿')

@include('layouts.nav')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4 rounded">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3 text-dark lighten-4">
                    <i class="fas fa-pen text-white" style="font-size: 25px"></i>
                    <span class="text-white">投稿</span>
                </h4>

                <div class="card-body text-center">
                    <div class="card-text">

                        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data" class="p-3 mb-1">
                            @csrf

                            @include('articles.form')

                            <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white" title="投稿" type="submit">
                                投稿する
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
