@extends('layouts.app')

@section('content')
    {{-- ユーザ一覧 --}}
    @include('users.users')
    {{--@include('user_follow.follow_button')--}}
@endsection

{{--ユーザ一覧、名前、目標とフォローボタンを設置したい--}}