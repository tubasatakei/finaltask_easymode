@if (Auth::id() != $goal->id)
    @if (Auth::user()->is_favorite($goal->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $goal->id], 'method' => 'delete']) !!}
            {!! Form::submit('がんばれ', ['class' => "btn btn-warning btn-lg"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $goal->id]]) !!}
            {!! Form::submit('応援する', ['class' => "btn btn-info btn-lg"]) !!}
        {!! Form::close() !!}
    @endif
@endif