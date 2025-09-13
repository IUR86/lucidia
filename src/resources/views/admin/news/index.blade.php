<x-admin.common>
    <main class="admin-main">
        <div class="page-header">
            <h1>お知らせ一覧</h1>
            <a href="{{ route('admin.news.create') }}" class="create-btn">＋ 作成</a>
        </div>
        <table class="admin-data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>タイトル</th>
                    <th>公開日</th>
                    <th>ステータス</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news_paginate as $counternewsparty)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->publication_start_date->format('Y-m-d') }}</td>
                        <td>{!! $news->getStatusHtml() !!}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['id' => $news->id]) }}">
                                <button class="action-btn">編集</button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <x-admin.table.none_data />
                @endforelse
            </tbody>
        </table>
    </main>
</x-admin.common>