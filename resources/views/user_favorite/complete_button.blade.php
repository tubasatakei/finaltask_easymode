@if (Auth::id() != $goal->id)
    @if (Auth::user()->is_complete($goal->id))
        {!! Form::open(['route' => ['completes.uncomplete', $goal->id], 'method' => 'delete']) !!}
            {!! Form::submit('未達成', ['class' => "btn btn-secondary btn-lg"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['completes.complete', $goal->id]]) !!}
            {!! Form::submit('達成', ['class' => "btn btn-success btn-lg"]) !!}
        {!! Form::close() !!}
    @endif
@endif