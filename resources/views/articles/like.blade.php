<div class="pt-2 pb-0">
    <div class="card-text">
        <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))' :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())' endpoint="{{ route('articles.like', ['article' => $article]) }}">
        </article-like>
    </div>
</div>
