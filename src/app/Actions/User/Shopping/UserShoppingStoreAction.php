<?php

namespace App\Actions\User\Shopping;

use App\Models\Cart;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

final class UserShoppingStoreAction
{
    /**
     * 購入確定処理を行います
     *
     * @param Request $request
     * @return \Stripe\Checkout\Session
     */
    public function __invoke(Request $request): \Stripe\Checkout\Session
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $stripe = new StripeService();
        $cart = new Cart();
        $using_cart = $cart->getUsingCart();

        $checkout_data = [];
        foreach ($using_cart->cartItems()->get() as $cart_item) {
            $checkout_data[] = [
                'price'    => $cart_item->product->stripe_price_id,
                'quantity' => $cart_item->quantity,
            ];
        }

        $checkout = $stripe->checkout($checkout_data);

        return $stripe->checkout($checkout_data);
    }
}
