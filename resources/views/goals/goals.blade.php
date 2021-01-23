@if (count($goals) > 0)
    <ul class="list-unstyled">
        @foreach ($goals as $goal)
            <li class="media mb-3">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $goal->user->name, ['user' => $goal->user->id]) !!}
                        <span class="text-muted">posted at {{ $goal->created_at }}</span>
                    </div>
                    <div>
                        {{-- 目標の投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($goal->content)) !!}</p>
                        <p><span class="badge badge-secondary">{{ $goal->favorite_count() }}頑張れ!</span></p>
                    </div>
                
                    <div>
                        @if (Auth::id() == $goal->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['goals.destroy', $goal->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                     @if (Auth::id() == $goal->user_id)
                         @include('user_favorite.complete_button')
                     @else
                         @include('user_favorite.favorite_button')
                     @endif
                </div>
            </li>
        @endforeach
    </ul>
@endif