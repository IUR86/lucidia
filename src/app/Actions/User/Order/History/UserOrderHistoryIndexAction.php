<?php

namespace App\Actions\User\Order\History;

use App\Models\Order;
use App\Services\StripeService;
use Illuminate\Support\Facades\Auth;

final class UserOrderHistoryIndexAction
{
    /**
     * 購入履歴を取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        $user = Auth::guard('user')->user();
        $order = new Order();
        $stripe = new StripeService();

        $order_histories = [];

        $stripe_order_histories = $stripe->getSessionsAll($user->stripe_id)->data;

        foreach ($stripe_order_histories as $stripe_order_history) {
            $stripe_order_history_items = $stripe->getAllLineItems($stripe_order_history->id, $user->stripe_id)->data;

            $order_data = $order->query()->firstWhere('stripe_checkout_session_id', $stripe_order_history->id);
            if ($order_data === null) {
                continue;
            }
            $order_histories[] = [
                'id'                => $stripe_order_history->id,
                'code'              => $order_data->code,
                'order_id'          => $order_data->id,
                'amount_subtotal'   => $stripe_order_history->amount_subtotal,
                'amount_total'      => $stripe_order_history->amount_total,
                'currency'          => $stripe_order_history->currency,
                'status'            => $stripe_order_history->payment_status,
                'products'          => $stripe_order_history_items,
                'order_at'          => $order_data->order_at
            ];
        }

        return [
            'order_histories' => $order_histories
        ];
    }
}
