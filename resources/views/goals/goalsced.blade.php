@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6">
            
            {{--create--}}
            {!! Form::model($goal, ['route' => 'goals.store']) !!}
            
                 <div class="form-group">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('新規目標作成', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
            
            {{--edit--}}
            {!! Form::model($goal, ['route' => ['goals.update', $goal->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
               {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
            
            {{--delete--}}
            {!! Form::model($goal, ['route' => ['goals.destroy', $goal->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-dager']) !!}
            {!! Form::close() !!}
            
            //目標達成ボタン
            
            @include('goals.goals')
        </div>
    </div>
@endsection
{{--　目標の作成、更新、削除ページ--}}