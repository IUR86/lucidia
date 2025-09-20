<x-admin.common>
    <main class="admin-main">
        <div class="page-header">
            <h1>商品一覧</h1>
            <a href="{{ route('admin.product.create') }}" class="create-btn">＋ 作成</a>
        </div>
        <table class="admin-data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>コード</th>
                    <th>商品名</th>
                    <th>料金</th>
                    <th>通過</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product_paginate as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->currency }}</td>
                    </tr>
                @empty
                    <x-admin.table.none_data />
                @endforelse
            </tbody>
        </table>
    </main>
</x-admin.common>