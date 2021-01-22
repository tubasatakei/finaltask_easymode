{!! Form::open(['route' => 'goals.store']) !!}
    <div class="form-group">
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('三日間がんばる！', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}