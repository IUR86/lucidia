<x-admin.common>
    <main class="admin-main">
        <div class="page-header">
            <h1>店舗一覧</h1>
            <a href="{{ route('admin.salon.create') }}" class="create-btn">＋ 作成</a>
        </div>
        <table class="admin-data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>契約者名</th>
                    <th>店舗名</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($salon_paginate as $salon)
                    <tr>
                        <td>{{ $salon->id }}</td>
                        <td>{{ $salon->counterparty->name }}</td>
                        <td>{{ $salon->name }}</td>
                        <td><a href="mailto:{{ $salon->email }}" id="mail-link">{{ $salon->email }}</a></td>
                        <td>{{ $salon->tel }}</td>
                    </tr>
                @empty
                    <x-admin.table.none_data />
                @endforelse
            </tbody>
        </table>
    </main>
</x-admin.common>