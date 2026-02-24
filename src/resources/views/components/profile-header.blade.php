<div>
    <img src="{{ asset('storage/' . $user->profile_image) }}" width="120" style="border-radius:50%;">

    <h2>{{ $user->name }}</h2>

    <a href="/mypage/profile">
        プロフィール編集
    </a>
</div>