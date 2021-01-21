@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                        @foreach ($user->goals as $goal)
                            {{$goal->content}}
                        @endforeach
                        
                        
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'ユーザ詳細', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
     {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif