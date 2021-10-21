<div class="border mb-1 mt-2"></div>
<div class="card-body pb-1 pt-1 pl-3">
    <div class="card-text">
        <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))' :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())' endpoint="{{ route('articles.like', ['article' => $article]) }}">
        </article-like>
    </div>
</div>
