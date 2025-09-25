<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <x-user.flash_message.success />
            <x-user.flash_message.alert alert_message="{{ $alert_message ?? '' }}" />
            <h1 class="shopping-title">パスワードリセット</h1>
            <div class="login-form-wrap">
                <form action="{{ route('user.password_reset.send') }}" method="POST">
                    @csrf
                    <div class="input-field">
                        <label>メールアドレス</label>
                        <input type="email" name="email" id="">
                    </div>
                    <p class="caution-message">
                        ご登録のメールアドレスを入力してください。<br />
                        パスワード再設定用のメールをお送りします。<br />
                        ※入力されたメールアドレスが登録されていない場合でも、その旨のご案内はいたしません。<br />
                        ※メールが届かない場合は迷惑メールフォルダをご確認ください。<br />
                        ※再設定用リンクの有効期限は24時間です。
                    </p>
                    <input type="submit" value="リセットメール送信" class="submit-buntton">
                </form>
            </div>
        </div>
    </main>
</x-user.common>