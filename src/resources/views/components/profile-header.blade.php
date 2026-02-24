<div class="profile-header">
    <div class="profile-left">
        <img class="profile-image" src="{{ asset('storage/' . $user->profile_image) }}">

        <h2 class="profile-name">
        {{ $user->name }}</h2>
    </div>   


    <a href="/profile/edit" class="profile-edit">
        プロフィール編集
    </a>

</div>