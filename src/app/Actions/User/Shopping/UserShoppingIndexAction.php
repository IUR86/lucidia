<?php

namespace App\Actions\User\Shopping;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

final class UserShoppingIndexAction
{
    /**
     * 購入手続き画面
     *
     * @return boolean
     */
    public function __invoke(): bool
    {
        $user = Auth::guard('user')->user();

        if ($user === null) {
            session()->flash('flash_message', 'ログインをしてください。');
            return false;
        }

        $using_cart = (new Cart())->getUsingCart();

        if (count($using_cart->cartItems()->get()->toArray()) < 1) {
            session()->flash('flash_message', 'カートに商品がないため追加してください。');
            return false;
        }

        return true;
    }
}
