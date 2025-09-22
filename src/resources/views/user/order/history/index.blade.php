<x-user.common>
    <main class="user-main">
        <div class="user-container">
            <h1 class="order_history-title">購入履歴</h1>
            <table class="order_history-table">
                <thead>
                    <tr>
                        <th>注文番号</th>
                        <th>合計金額</th>
                        <th>状態</th>
                        <th>注文日</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_histories as $order_history)
                        <tr>
                            <td>{{ $order_history['code'] }}</td>
                            <td>{{ $order_history['amount_total'] }}円</td>
                            <td>{{ $StripePaymentStatus::from($order_history['status'])->label() }}</td>
                            <td>{{ $order_history['order_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</x-user.common>
