<div class="row justify-content-center">
    <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <div class="card mt-3 shadow-none" style="border-radius: 1rem">
            <div class="card-body pb-0">
                <div class="d-flex flex-row">
                    <a href="{{ route('users.show', ['name' => $person->name]) }}">
                        <span class="d-flex align-items-center mr-2" style="text-decoration: none;">
                            @if (!empty($person->avatar_file_name))
                            <img src="{{ asset('https://portfolio-s3-backe.s3.ap-northeast-1.amazonaws.com/avatars/' . $person->avatar_file_name) }}" class="rounded-circle" style="object-fit: cover; width: 55px; height: 55px;">
                            @else
                            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 55px; height: 55px;">
                            @endif
                        </span>
                    </a>
                    <span class="card-title text-dark h3 m-0 d-flex align-items-center">{{ $person->name }}</span>

                    @if( Auth::id() !== $person->id )
                    <follow-button class="ml-auto" :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $person->name]) }}">
                    </follow-button>
                    @endif

                </div>
                <div class="card-text mt-3">
                    {{ $person->self_introduction }}
                </div>
            </div>
            <!--フォロー数カウント-->
            <div class="card-body">
                <div class="card-text">
                    <a href="{{ route('users.followings', ['name' => $person->name]) }}" class="text-dark mr-2">
                        {{ $person->count_followings }} フォロー中
                    </a>
                    <a href="{{ route('users.followers', ['name' => $person->name]) }}" class="text-dark">
                        {{ $person->count_followers }} フォロワー
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
