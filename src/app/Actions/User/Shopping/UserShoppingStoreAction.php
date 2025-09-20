<?php

namespace App\Actions\User\Shopping;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\StripeService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $cart_items = $using_cart->cartItems()->get();

        $checkout_data = $cart_items->map(function ($item) {
            return [
                'price' => $item->product->stripe_price_id,
                'quantity' => $item->quantity,
            ];
        })->toArray();

        try {
            $checkout = DB::transaction(function () use ($stripe, $cart_items, $checkout_data, $using_cart) {
                $checkout = $stripe->checkout($checkout_data);

                $order = new Order();
                $order->fill($checkout->toArray());
                $order->save();

                Log::info("受注:{$order->id}が登録されました");

                $using_cart->delete();
                Log::info("カート:{$using_cart->id}が削除されました");

                foreach ($cart_items as $cart_item) {
                    $order_item = new OrderItem();
                    $order_item->setSavingData($order, $cart_item);
                    $order_item->save();
                    Log::info("受注商品:{$order_item->id}が登録されました", ["order_id" => $order->id]);

                    $cart_item->delete();
                    Log::info("カート商品:{$cart_item->id}が削除されました", ["cart_id" => $cart_item->cart_id]);
                }

                return $checkout;
            });
        } catch (Exception $e) {
            Log::error('注文処理エラー: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            abort(500, '注文処理に失敗しました。');
        }

        return $checkout;
    }
}
