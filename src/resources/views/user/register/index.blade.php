<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <x-user.flash_message.alert />
            <h1 class="shopping-title">新規登録</h1>
            <div class="login-form-wrap">
                <form action="{{ route('user.register.store') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <label>名前</label>
                        <input type="text" name="name" id="">
                    </div>
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
                    <input type="submit" value="新規登録" class="submit-buntton">
                </form>
            </div>
        </div>
    </main>
</x-user.common>