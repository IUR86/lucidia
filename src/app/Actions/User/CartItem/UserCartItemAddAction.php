<?php

namespace App\Actions\User\CartItem;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class UserCartItemAddAction
{
    /**
     * カートに商品を追加します
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request): void
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $cart = new Cart();
        $cart_item = new CartItem();
        $product = new Product();

        $using_cart = $cart->getUsingCart();
        $product_id = $request->get('product_id');

        $cart_item->add($using_cart, $product->query()->findOrFail($product_id), $request->get('quantity'));
    }
}
