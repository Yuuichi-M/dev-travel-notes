<div class="fixed-top">
    <nav class="navbar navbar-expand border-bottom bg-white shadow-none">
        <div class="container">
            <a class="navbar-brand font-weight-bold deep-orange-text" title="ホーム" href="/">
                <i class="fab fa-fly"></i>
                {{ config('app.name') }}
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    @guest
                    <li class="nav-item">
                        <a class="nav-link h5 home-nav-icon" href="{{ route('register') }}" role="button" title="アカウント登録">
                            <i class="fas fa-user-alt deep-orange-text mr-2 mt-2"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h5 home-nav-icon" href="{{ route('login') }}" role="button" title="ログイン">
                            <i class="fas fa-sign-in-alt deep-orange-text mr-2 mt-2"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h5 home-nav-icon" href="{{ route('login.guest') }}" role="button" title="ゲストログイン">
                            <i class="fas fa-user-tie deep-orange-text mt-2"></i>
                        </a>
                    </li>

                    @else

                    <!-- dropdown menu -->
                    <li class="nav-item dropdown ml-2">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle deep-orange-text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (!empty(Auth::user()->avatar_file_name))
                            <img src="{{ asset('https://portfolio-s3-backe.s3.ap-northeast-1.amazonaws.com/avatars/' . Auth::user()->avatar_file_name) }}" class="rounded-circle" style="object-fit: cover; width: 31px; height: 31px;">
                            @else
                            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 31px; height: 31px;">
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark" href="{{ route("users.show", ["name" => Auth::user()->name]) }}">
                                @if (!empty(Auth::user()->avatar_file_name))
                                <img src="{{ asset('https://portfolio-s3-backe.s3.ap-northeast-1.amazonaws.com/avatars/' . Auth::user()->avatar_file_name) }}" class="rounded-circle mr-1" style="object-fit: cover; width: 22px; height: 22px;">
                                @else
                                <img src="/images/avatar-default.svg" class="rounded-circle mr-1" style="object-fit: cover; width: 22px; height: 22px;">
                                @endif
                                マイページ
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-dark" href="{{ route('articles.create') }}">
                                <i class="fas fa-paper-plane mr-2"></i>
                                投稿する
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-button').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                ログアウト
                            </a>
                            <form id="logout-button" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <!-- dropdown menu -->
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    @auth
    <form class="form-inline deep-orange lighten-5" method="GET" action="{{ route('articles.index') }}" style="width: 100%;">
        <div class="mx-auto mt-2 mb-2 navbar-searchForm">
            <div class="input-group">
                <div class="input-group-prepend">
                    <select class="custom-select text-dark" name="category" id="category" style="border-style: solid; border-color: #ff7043;">
                        <option value="">
                            全て
                        </option>
                        @foreach ($prefectures as $prefecture)
                        <option value="prefecture:{{$prefecture->id}}" class="font-weight-bold" {{ $searchData['category'] == "prefecture:" . $prefecture->id ? 'selected' : ''}}>{{ $prefecture->prefecture }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="text" name="keyword" id="keyword" class="form-control text-dark" value="{{$searchData['keyword']}}" aria-label="Text input with dropdown button" placeholder="キーワード検索" style="border-style: solid; border-color: #ff7043;">
                <div class="input-group-append">
                    <button type="submit" class="btn bg-white shadow-none m-0" style="padding-top: 10px; padding-bottom: 9px; border-style: solid; border-color: #ff7043;">
                        <i class="fas fa-search deep-orange-text"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
    @endauth

</div>
