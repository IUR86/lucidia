<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <h1 class="shopping-title">購入手続き</h1>
            <form action="{{ route('user.shopping.store') }}" method="POST">
                @csrf
                <section class="shopping-item-wrap">
                    <h2>支払い方法</h2>
                    <div class="payment-methods">
                        @foreach ($PaymentMethod::cases() as $payment_method)
                            <label class="payment-option">
                                <input type="radio" name="payment_method_id" value="{{ $payment_method->value }}">
                                <span class="payment-label">{{ $payment_method->label() }}</span>
                            </label>
                        @endforeach
                    </div>
                </section>
                <section class="shopping-item-wrap">
                    <h2>購入商品</h2>
                    <x-user.cart.cart-item-table />
                    <div class="cart-button-container">
                        <button class="back-button">戻る</button>
                        <button class="next-button">購入確定</button>
                    </div>
                </section>
            </form>
        </div>
    </main>
</x-user.common>