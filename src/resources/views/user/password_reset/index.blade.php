<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <x-user.flash_message.success />
            <x-user.flash_message.alert alert_message="{{ $alert_message ?? '' }}" />
            <h1 class="shopping-title">パスワードリセット</h1>
            <form action="{{ route('user.password_reset.send') }}" method="POST">
                @csrf
                <div class="input-field">
                    <label>メールアドレス</label>
                    <input type="email" name="email" id="">
                </div>
                <input type="submit" value="パスワードリセットメール" class="submit-buntton">
            </form>
        </div>
    </main>
</x-user.common>