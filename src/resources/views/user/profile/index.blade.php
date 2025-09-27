<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <x-user.flash_message.success />
            <x-user.flash_message.alert />
            <h1 class="shopping-title">プロフィール</h1>
            <form class="form-profile-wrap" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile-wrap">
                    <div class="backimg">
                        <label for="changeInput">
                            <img id="previewImage" src="{{ $user->back_image_url }}" alt="">
                        </label>
                        <input id="changeInput" type="file" accept="image/*" name="image" alt="送信ボタン">
                    </div>
                </div>
                <div class="login-form-wrap">
                    <div class="input-field">
                        <label class="required">名前</label>
                        <input type="text" name="name" value="{{ $user->name }}">
                        <x-user.form.error_message name="name" />
                    </div>
                    <div class="input-field">
                        <label class="required">メールアドレス</label>
                        <input type="email" name="email" value="{{ $user->email }}">
                        <x-user.form.error_message name="email" />
                    </div>
                    <div class="input-field">
                        <label class="required">郵便番号</label>
                        <input type="text" name="postal_code" value="{{ $user->postal_code }}">
                        <x-user.form.error_message name="postal_code" />
                    </div>
                    <div class="input-field">
                        <label class="required">都道府県、市区町村、町名、番地</label>
                        <input type="text" name="address1" value="{{ $user->address1 }}">
                        <x-user.form.error_message name="address1" />
                    </div>
                    <div class="input-field">
                        <label>建物名、部屋番号、フロア</label>
                        <input type="text" name="address2" value="{{ $user->address2 }}">
                        <x-user.form.error_message name="address2" />
                    </div>
                    <input type="submit" value="編集" class="submit-buntton">
                </div>
            </form>
        </div>
    </main>
</x-user.common>