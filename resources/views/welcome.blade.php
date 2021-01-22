@extends('layouts.app')

@section('content')
　　 @if (Auth::check())
　　    <div class="row">
            <aside class="col-sm-4">
                 {{-- 名前 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 投稿フォーム --}}
                @include('goals.form')
                {{-- 投稿一覧 --}}
                @include('goals.goals')
            </div>
                    {{-- フォローボタン--}}
                    @include('user_follow.follow_button')
                    </div>
                </div>    
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>三日坊主チャレンジ</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '利用登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection

