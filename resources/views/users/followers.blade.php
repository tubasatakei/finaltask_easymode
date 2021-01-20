@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
          
            {{-- ユーザ一覧 --}}
            @include('users.users')
           {{-- @include('goals.goals')--}}
            @include('user_follow.follow_button')
        </div>
    </div>
@endsection

{{--名前、目標、フォローボタンを入れたい--}}