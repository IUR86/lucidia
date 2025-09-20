<?php

namespace App\Http\Controllers\Counterparty;

use App\Actions\Counterparty\Shop\CounterpartyShopIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class ShopController extends Controller
{
    public function index(CounterpartyShopIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('counterparty.shop.index', $action());
    }
}
