<x-admin.common>
    <main class="auth__main">
        <div class="login-wrapper">
            <h2>管理画面ログイン</h2>
            <form action="{{ route('admin.login.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>メールアドレス</label>
                    <input type="email" name="email" placeholder="メールアドレス">
                </div>
                <div class="form-group">
                    <label>パスワード</label>
                    <input type="password" name="password" placeholder="パスワード">
                </div>
                <button type="submit" class="login-button">ログイン</button>
            </form>
        </div>
    </main>
</x-admin.common>