<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
    </div>
</div>{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')
