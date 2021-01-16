@extends('layouts.app')

@section('content')
　　 @if (Auth::check())
　　     <div class="row">
            <aside class="col-sm-4">
                 {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('goals.goals')
            </div>
        </div>
    @else
    //登録日時降順のユーザ一覧にしたい
       <div class="row">
            <aside class="col-sm-4">
                 {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('goals.goals')
            </div>
        </div>
    @endif
@endsection


{{-- 後で目標一覧に変える--}}