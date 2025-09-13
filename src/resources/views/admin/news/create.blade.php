<x-admin.common>
    <main class="admin-main">
        <div class="form-container">
            <h1>お知らせ作成</h1>
            <form action="{{ route('admin.news.store') }}" method="POST">
                @csrf
                <x-admin.form.input.text name="title" label="タイトル" />
                <x-admin.form.input.date name="publication_start_date" label="公開開始日時" />
                <x-admin.form.input.date name="publication_end_date" label="公開終了日時" />
                <x-admin.form.input.select name="target" label="対象" />
                <x-admin.form.input.textarea name="body" label="本文" />
                <x-admin.form.button.submit label="作成" />
            </form>
        </div>
    </main>
</x-admin.common>