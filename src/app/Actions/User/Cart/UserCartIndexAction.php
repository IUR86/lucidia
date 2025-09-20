<?php

namespace App\Actions\User\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Log;

final class UserCartIndexAction
{
    /**
     * カート情報を取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $cart = new Cart();
        $using_cart = $cart->getUsingCart();

        return [
            'using_cart' => $using_cart,
        ];
    }
}
