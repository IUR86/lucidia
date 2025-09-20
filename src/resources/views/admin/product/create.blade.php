<x-admin.common>
    <main class="admin-main">
        <div class="form-container">
            <h1>商品作成</h1>
            <form action="{{ route('admin.product.store') }}" method="POST">
                @csrf
                <x-admin.form.input.text name="name" label="商品名" />
                <x-admin.form.button.submit label="作成" />
            </form>
        </div>
    </main>
</x-admin.common>