@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
            
                 <div class="form-group">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('新規目標作成', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
            
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
               {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                
            {!! Form::close() !!}
            
            {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-dager']) !!}
            {!! Form::close() !!}
            
            //目標達成ボタン
        </div>
    </div>
@endsection

{{--　課題の作成、更新、削除ページ--}}