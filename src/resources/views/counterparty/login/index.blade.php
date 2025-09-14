<form action="{{ route('counterparty.login.login', ['subdomain' => request()->route('subdomain')]) }}" method="POST">
    @csrf
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="submit" value="ログイン">
</form>