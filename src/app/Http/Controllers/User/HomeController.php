<?php

namespace App\Http\Controllers\User;

use App\Enum\ProductType;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

final class HomeController extends Controller
{
    /**
     * ホーム画面を表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $product_service  = Product::query()->where('type', ProductType::SERVICE)->get();
        $product_function = Product::query()->where('type', ProductType::FUNCTION)->get();

        return view('user.home.index', ['product_service' => $product_service, 'product_function' => $product_function]);
    }
}
