<?php

namespace App\Actions\User\Shopping;

use App\Enum\SessionKey;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

final class UserShoppingIndexAction
{
    /**
     * 購入手続き画面
     *
     * @return boolean
     */
    public function __invoke(): bool
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $user = Auth::guard('user')->user();

        $using_cart = (new Cart())->getUsingCart();

        if (count($using_cart->cartItems()->get()->toArray()) < 1) {
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, 'カートに商品がないため追加してください。');
            return false;
        }

        return true;
    }
}
