<?php

namespace App\Actions\User\Shopping;

use App\Models\Order;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class UserShoppingCompleteAction
{
    /**
     * 購入画面を表示
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request): void
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $session_id = $request->get('session_id');

        if ($session_id === null) {
            abort(403);
        }

        $stripe = new StripeService();
        $session = $stripe->findSession($session_id);
        $payment_intent = $stripe->findPaymentIntent($session->payment_intent);
        $payment_method = $stripe->findPaymentMethod($payment_intent->payment_method);

        $order = (new Order())->newQuery()->whereStripeCheckoutSessionId($session_id)->firstOrFail();
        $order->updateOrderComplete($session, $payment_method);
    }
}
