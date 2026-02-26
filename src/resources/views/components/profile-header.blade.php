<div class="profile-header">
    <div class="profile-left">

        <div class="profile-image-circle">
            <img class="profile-image" src="{{ asset('storage/' . $user->profile_image) }}">
        </div>

        <h2 class="profile-name">
            {{ $user->name }}
        </h2>

    </div>

    <a href="{{ route('mypage.profile.edit') }}" class="image-select-btn">
    プロフィールを編集する
    </a>
    
    </div>