<x-admin.common>
    <main class="admin-main">
        <div class="page-header">
            <h1>契約相手一覧</h1>
            <a href="{{ route('admin.counterparty.create') }}" class="create-btn">＋ 作成</a>
        </div>
        <table class="admin-data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>メールアドレス</th>
                    <th>サブドメイン</th>
                    <th>料金</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($counterparty_paginate as $counterparty)
                    <tr>
                        <td>{{ $counterparty->id }}</td>
                        <td>{{ $counterparty->name }}</td>
                        <td>{{ $counterparty->email }}</td>
                        <td>{{ $counterparty->subdomain }}</td>
                        <td>{{ $counterparty->price }}円</td>
                        <td>
                            <a href="{{ route('counterparty.home.index', ['subdomain' => $counterparty->subdomain]) }}">リンク</a>
                        </td>
                    </tr>
                @empty
                    <x-admin.table.none_data />
                @endforelse
            </tbody>
        </table>
    </main>
</x-admin.common>