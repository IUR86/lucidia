<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Order\History\UserOrderHistoryIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

final class OrderHistoryController extends Controller
{
    /**
     * 購入履歴を表示
     *
     * @param UserOrderHistoryIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(UserOrderHistoryIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $result = $action();

        $this->meta_service->setTitle('購入履歴');
        $this->meta_service->setDescription('説明');

        return view('user.order.history.index', [
            'order_histories'   => $result['order_histories'],
            'meta_service'      => $this->meta_service,
        ]);
    }
}
