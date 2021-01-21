@extends('layouts.app')

@section('content')
    {{-- ユーザ一覧 --}}
    @include('users.users')
@endsection

{{--ユーザ一覧、名前、目標とフォローボタンを設置したい--}}