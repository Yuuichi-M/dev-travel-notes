@csrf
<div class="md-form">
    <label for="title">タイトル</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required value="{{ old('title') }}">

    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

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
