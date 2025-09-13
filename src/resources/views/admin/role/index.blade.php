<x-admin.common>
    <main class="admin-main">
        <div class="page-header">
            <h1>権限一覧</h1>
            <a href="{{ route('admin.role.create') }}" class="create-btn">＋ 作成</a>
        </div>
        <table class="admin-data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>種類</th>
                    <th>名称</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($role_paginate as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->kinds->label() }}</td>
                        <td>{{ $role->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-admin.common>