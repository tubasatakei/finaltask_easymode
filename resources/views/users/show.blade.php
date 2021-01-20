@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
             {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
            
            @include('goals.goals')
            @include('tasks.tasks')
            
    </div>
@endsection

{{-- マイページ、目標、課題一覧とそれぞれの作成等のページに飛ばしたい--}}