<?php

namespace App\Http\Controllers\Counterparty;

use App\Actions\Counterparty\Profile\CounterpartyProfileIndexAction;
use App\Actions\Counterparty\Profile\CounterpartyProfileUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Counterparty\Profile\CounterpartyProfileUpdateRequest;
use Illuminate\Support\Facades\Log;

final class ProfileController extends Controller
{
    /**
     * プロフィール画面を表示
     *
     * @param CounterpartyProfileIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(CounterpartyProfileIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('counterparty.profile.index', $action());
    }

    /**
     * プロフィールを更新
     *
     * @param CounterpartyProfileUpdateRequest $request
     * @param CounterpartyProfileUpdateAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CounterpartyProfileUpdateRequest $request, CounterpartyProfileUpdateAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $action($request);

        session()->flash('message_info', '契約情報が更新されました');

        return redirect()->intended(route('counterparty.profile.index', ['subdomain' => $this->subdomain]));
    }
}
