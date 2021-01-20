<header class="mb-4">
    <nav class="navbar navbar-expand navbar-darf bg-light">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Finaltask</a>

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
                    <li class="nav-item">{!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()]) !!}</li>
                    
                    {{-- フォロー一覧へのリンク --}}
                    {{--<li class="nav-item">{!! link_to_route('users.followings','フォロー一覧', ['class' => 'nav-link']) !!}</li>--}}
                    <li class="nav-item">
                        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                        フォロー一覧
                        </a>
                    </li>
                         
                    {{-- フォロワー一覧へのリンク --}}
                    {{--<li class="nav-item">{!! link_to_route('users.followers','フォロワー一覧', ['class' => 'nav-link']) !!}</li>--}}
                    <li class="nav-item">
                        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                        フォロワー一覧
                        </a>
                    </li> 
                            {{-- ログアウトへのリンク --}}
                            <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
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