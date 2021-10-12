<div style="text-align: initial;">

    <!--
    <div>投稿画像</div>
    <div style=color:red;>(注)jpeg,png形式 サイズ:2MB未満</div>
    <span class="article-image-form image-picker">
        <input type="file" name="article-image" class="d-none" accept="image/png,image/jpeg,image/gif" id="article-image" />
        <label for="article-image" class="d-inline-block" role="button">
            <img src="/images/item-image-default.png" style="object-fit: cover; width: 200px; height: 150px;">
        </label>
    </span>

    @error('article-image')
    <div style="color: #E4342E;" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    -->

    <div class="form-group row">
        <p class="col-md-12 text-center text-dark">
            <span class="text-danger">(※)</span>は入力必須項目です。
        </p>
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
