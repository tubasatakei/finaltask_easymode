<header class="mb-4">
    <nav class="navbar navbar-expand navbar-dark bg-secondary">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">三日坊主チャレンジ</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <div class="dropdown">
                <button type="button" class="btn btn-light btn-lg dropdown-toggle" data-toggle="dropdown">
                    メニュー 
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item">
                    @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク --}}
                    {!! link_to_route('users.index', 'ユーザ一覧', [], ['class' => 'nav-link']) !!}</a>
                    <a class="dropdown-item">
                    {{-- ユーザ詳細(マイページ）へのリンク --}}
                    {!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()]) !!}</a>
                    {{-- フォロー一覧へのリンク --}}
                    <a class="dropdown-item">
                        <a href="{{ route('users.followings', ['id' => Auth::id()]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                        フォロー
                        </a>
                    </a>
                    {{-- フォロワー一覧へのリンク --}}
                    <a class="dropdown-item">
                        <a href="{{ route('users.followers', ['id' => Auth::id()]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                        フォロワー
                        </a>
                    </a>
                    {{-- ログアウトへのリンク --}}
                    <a class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</a>
    
                    @else
                    {{-- ログインページへのリンク --}}
                    <a class="dropdown-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</a>
                    {{-- ユーザ登録ページへのリンク --}}
                    <a class="dropdown-item">{!! link_to_route('signup.get', '利用登録', [], ['class' => 'nav-link']) !!}</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>

{{--　タブをボタンに変えたい--}}