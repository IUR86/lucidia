<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Counterparty\AdminCounterpartyIndexAction;
use App\Actions\Admin\Counterparty\AdminCounterpartyStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Counterparty\AdminCounterpartyRequest;
use Illuminate\Support\Facades\Log;

final class CounterpartyController extends Controller
{
    /**
     * 契約相手一覧を表示します
     *
     * @param AdminCounterpartyIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminCounterpartyIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.counterparty.index', $action());
    }

    /**
     * 契約相手作成画面
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.counterparty.create');
    }

    /**
     * 契約相手を保存します
     *
     * @param AdminCounterpartyRequest $request
     * @param AdminCounterpartyStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminCounterpartyRequest $request, AdminCounterpartyStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $action($request);

        return redirect()->route('admin.counterparty.index');
    }
}
