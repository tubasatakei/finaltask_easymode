@extends('layouts.app')

@section('content')
　　 @if (Auth::check())
　　    <div class="row">
            <aside class="col-sm-4">
                 {{-- 名前 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 目標一覧 --}}
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                         @include('goals.goals') 
                    </button>
                    <div class="dropdown-menu">{{--以下ドロップダウンする目標、メニューリンク？--}}
                    {{-- フォローボタン--}}
                    @include('user_follow.follow_button')
                    </div>
                </div>    
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Finaltask</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection

