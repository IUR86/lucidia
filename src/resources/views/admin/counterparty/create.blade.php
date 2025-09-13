<x-admin.common>
    <main class="admin-main">
        <div class="form-container">
            <h1>契約相手作成</h1>
            <form action="{{ route('admin.counterparty.store') }}" method="POST">
                @csrf
                <x-admin.form.input.text name="name" label="契約相手" />
                <x-admin.form.input.email name="email" label="メールアドレス" />
                <x-admin.form.input.text name="password" label="パスワード" />
                <x-admin.form.input.text name="subdomain" label="サブドメイン" />
                <x-admin.form.input.number name="price" label="料金" />
                <x-admin.form.button.submit label="作成" />
            </form>
        </div>
    </main>
</x-admin.common>