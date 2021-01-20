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
                        {{-- 目標の投稿内容 ドロップダウン、投稿、、更新、削除は別ページ--}}
                        <p class="mb-0">{!! nl2br(e($goal->content)) !!}</p>
                    </div>
                    {{-- 課題の一覧入れる、ページネーション--}}
                    @include('tasks.tasks')
                </div>
            </li>
        @endforeach
    </ul>
@endif