<header class="mb-4">
    <nav class="navbar navbar-expand navbar-dark bg-secondary">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">三日坊主チャレンジ</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザ一覧', [], ['class' => 'nav-link']) !!}</li>
                    
                    {{-- ユーザ詳細(マイページ）へのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.show', '目標一覧', ['user' => Auth::id()]) !!}</li>
                    
                    {{-- フォロー一覧へのリンク --}}
                    <li class="nav-item">
                        <a href="{{ route('users.followings', ['id' => Auth::id()]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                        フォロー
                        </a>
                    </li>
                         
                    {{-- フォロワー一覧へのリンク --}}
                    <li class="nav-item">
                        <a href="{{ route('users.followers', ['id' => Auth::id()]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                        フォロワー
                        </a>
                    </li>
                 
                    {{-- ログアウトへのリンク --}}
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                    
                @else
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>

{{--　タブをボタンに変えたい--}}