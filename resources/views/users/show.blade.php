@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
             {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            @if (Auth::id() == $user->id)
                {{-- 投稿フォーム --}}
                @include('goals.form')
            @endif
            {{-- 投稿一覧 --}}
            @include('goals.goals')
         </div>   
    </div>
@endsection

