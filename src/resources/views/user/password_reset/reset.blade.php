<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <x-user.flash_message.success />
            <x-user.flash_message.alert alert_message="{{ $alert_message ?? '' }}" />
            <h1 class="shopping-title">パスワードリセット設定</h1>
            <form action="{{ route('user.password_reset.update', ['token' => $token, 'email' => $email]) }}" method="POST">
                @csrf
                <div class="input-field">
                    <label>パスワード</label>
                    <input type="password" name="password">
                </div>
                <div class="input-field">
                    <label>パスワード(確認用)</label>
                    <input type="password" name="password_confirmation">
                </div>
                <input type="submit" value="パスワードリセットメール" class="submit-buntton">
            </form>
        </div>
    </main>
</x-user.common>