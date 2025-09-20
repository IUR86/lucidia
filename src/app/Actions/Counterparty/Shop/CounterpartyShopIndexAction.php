<?php

namespace App\Actions\Counterparty\Shop;

use Illuminate\Support\Facades\Auth;

final class CounterpartyShopIndexAction
{
    public function __invoke(): array
    {
        $counterparty_user = Auth::guard('counterparty')->user();
    }
}
