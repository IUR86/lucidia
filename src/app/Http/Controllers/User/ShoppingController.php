<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Shopping\UserShoppingIndexAction;
use App\Actions\User\Shopping\UserShoppingStoreAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class ShoppingController extends Controller
{
    /**
     * 購入手続き画面を表示
     *
     * @param UserShoppingIndexAction $action
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(UserShoppingIndexAction $action): \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $result = $action();

        if ($result === false) {
            return redirect()->back();
        }

        return view('user.shopping.index');
    }

    /**
     * 購入を行います
     *
     * @param Request $request
     * @param UserShoppingStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, UserShoppingStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return redirect($action($request)->url);
    }

    /**
     * 購入完了画面を表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function complete(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('user.shopping.complete');
    }
}
