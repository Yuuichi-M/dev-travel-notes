<!--タグ表示 タグ画面遷移-->
@foreach($article->tags as $tag)
@if($loop->first)
<div class="pt-3 pb-1">
    <div class="card-text line-height">
        @endif
        <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted" style="text-decoration: none;">
            {{ $tag->hashtag }}
        </a>
        @if($loop->last)
    </div>
</div>
@endif
@endforeach
