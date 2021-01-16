@extends('layouts.app')

@section('content')
　　 @if (Auth::check())
　　     <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}<h3>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </aside>
            <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('goals.goals')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Finaltask</h1>
        {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection


{{-- 後で目標一覧に変える--}}