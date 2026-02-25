<div class="profile-header">
    <div class="profile-left">

        <div class="profile-image-circle">
            <img class="profile-image" src="{{ asset('storage/' . $user->profile_image) }}">
        </div>

        <h2 class="profile-name">
            {{ $user->name }}
        </h2>

    </div>

    <label for="imageInput" class="image-select-btn">
        画像を選択する
    </label>
    
    </div>
    
    <input type="file" name="profile_image" id="imageInput" hidden>