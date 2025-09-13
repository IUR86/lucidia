<x-admin.common>
    <main class="admin-main">
        <div class="form-container">
            <h1>お知らせ作成</h1>
            <form action="{{ route('admin.salon.store') }}" method="POST">
                @csrf
                <x-admin.form.input.text name="name" label="店舗名" />
                <x-admin.form.input.textarea name="description" label="説明" />
                <x-admin.form.input.select name="prefecture" label="都道府県" />
                <x-admin.form.input.text name="tel" label="電話番号" />
                <x-admin.form.input.text name="postal_code" label="郵便番号" />
                <x-admin.form.input.text name="address1" label="市区町村" />
                <x-admin.form.input.text name="address2" label="番地・建物名など" />
                <x-admin.form.input.text name="latitude" label="緯度" />
                <x-admin.form.input.text name="longitude" label="経度" />
                <x-admin.form.input.text name="email" label="メールアドレス" />
                <x-admin.form.input.time name="opening_time" label="営業開始時間" />
                <x-admin.form.input.time name="closing_time" label="営業終了時間" />
                <x-admin.form.input.text name="regular_holiday" label="定休日" />
                <x-admin.form.input.text name="website_url" label="サイトURL" />
                <x-admin.form.input.number name="capacity" label="最大同時予約数" />
                <x-admin.form.button.submit label="作成" />
            </form>
        </div>
    </main>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
@endif
</x-admin.common>