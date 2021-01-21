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
            @include('tasks.tasks')
         </div>   
    </div>
@endsection

{{-- マイページ、目標、課題一覧とそれぞれの作成等のページに飛ばしたい--}}