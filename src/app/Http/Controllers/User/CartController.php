<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Cart\UserCartIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

final class CartController extends Controller
{
    /**
     * カート画面を表示
     *
     * @param UserCartIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(UserCartIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $result = $action();

        $this->meta_service->setTitle('ログイン');
        $this->meta_service->setDescription('説明');

        return view('user.cart.index', [
            'using_cart'        => $result['using_cart'],
            'meta_service'      => $this->meta_service,
        ]);
    }
}
