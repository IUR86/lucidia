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
        $order->customer_name = $session->customer_details->name;
        $order->customer_email = $session->customer_details->email;
        $order->customer_phone = $session->customer_details->phone;
        $order->payment_method = $payment_method->type;
        $order->payment_card_brand = $payment_method->card->brand;
        $order->payment_card_last4 = $payment_method->card->last4;
        $order->payment_status = $session->payment_status;
        $order->stripe_response = $session->toArray();
        $order->stripe_payment_intent_id  = $session->payment_intent;

        $order->save();
    }
}
