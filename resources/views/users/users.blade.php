@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <div>
                {{ $user->name }}
            </div>
            <div>
                {{-- ユーザ詳細ページへのリンク --}}
                <p>{!! link_to_route('users.show', 'ユーザ詳細', ['user' => $user->id]) !!}</p>
            </div>
        @endforeach
    </ul>
     {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif