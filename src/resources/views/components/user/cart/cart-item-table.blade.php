<table class="cart-table">
    <thead>
        <tr>
            <th>商品内容</th>
            <th>価格</th>
            <th>数量</th>
            <th>小計</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($using_cart->cartItems as $cart_item)
            <tr>
                <td>{{ $cart_item->product->name }}</td>
                <td>{{ $cart_item->product->price }}円</td>
                <td>{{ $cart_item->quantity }}個</td>
                <td>{{ $cart_item->quantity * $cart_item->product->price }}円</td>
            </tr>
        @endforeach
    </tbody>
</table>