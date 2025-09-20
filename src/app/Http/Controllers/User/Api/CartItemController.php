<?php

namespace App\Http\Controllers\User\Api;

use App\Actions\User\CartItem\UserCartItemAddAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class CartItemController extends Controller
{
    /**
     * 商品をカートに追加します
     *
     * @param Request $request
     * @param UserCartItemAddAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request, UserCartItemAddAction $action): \Illuminate\Http\JsonResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $action($request);

        return $this->apiResponse(true);
    }
}
