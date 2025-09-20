<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <h1 class="cart-title">現在のカート</h1>
            <x-user.cart.cart-item-table />
            <div class="cart-button-container">
                <button class="back-button">戻る</button>
                <button class="next-button" onclick="window.location.href='{{ route('user.shopping.index') }}'">購入手続き</button>
            </div>
        </div>
    </main>
</x-user.common>