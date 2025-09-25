<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <x-user.flash_message.success />
            <x-user.flash_message.alert />
            <h1 class="shopping-title">ログイン</h1>
            <div class="login-form-wrap">
                <form action="{{ route('user.login.login') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <label>メールアドレス</label>
                        <input type="email" name="email" id="">
                    </div>
                    <div class="input-field">
                        <label>パスワード</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="input-field-show-password">
                        <input type="checkbox" name="" id="show-password">
                        <label for="show-password" id="togglePassword">パスワードを見る</label>
                    </div>
                    <div class="link-wrap">
                        <a href="{{ route('user.register.index') }}">新規会員登録</a>
                        <a href="{{ route('user.password_reset.index') }}">パスワードリセット</a>
                    </div>
                    <input type="submit" value="ログイン" class="submit-buntton">
                </form>
            </div>
        </div>
    </main>
</x-user.common>