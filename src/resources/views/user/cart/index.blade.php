<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <x-user.flash_message.alert />
            <h1 class="cart-title">現在のカート</h1>
            <x-user.cart.cart-item-table />
            <div class="cart-button-container">
                <button class="back-button">戻る</button>
                <form action="{{ route('user.shopping.index') }}" method="POST">
                    @csrf
                    <button class="next-button">購入手続き</button>
                </form>
            </div>
        </div>
    </main>
</x-user.common>