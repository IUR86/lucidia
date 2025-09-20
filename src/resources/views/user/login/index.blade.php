<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <h1 class="shopping-title">ログイン</h1>
            <form action="{{ route('user.login.login') }}" method="POST">
                @csrf
                <input type="email" name="email" id="">
                <input type="password" name="password">
                <input type="submit" value="ログイン">
            </form>
        </div>
    </main>
</x-user.common>