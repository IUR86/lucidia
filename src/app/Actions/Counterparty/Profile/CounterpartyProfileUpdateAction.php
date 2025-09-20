<?php

namespace App\Actions\Counterparty\Profile;

use App\Http\Requests\Counterparty\Profile\CounterpartyProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

final class CounterpartyProfileUpdateAction
{
    /**
     * 契約情報を更新
     *
     * @param CounterpartyProfileUpdateRequest $request
     * @return void
     */
    public function __invoke(CounterpartyProfileUpdateRequest $request): void
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        /** @var Counterparty $counterparty_user */
        $counterparty_user = Auth::guard('counterparty')->user();

        Log::info("契約情報更新前データ", $counterparty_user->toArray());

        $counterparty_user->fill($request->validated());
        $counterparty_user->save();

        Log::info("契約情報:{$counterparty_user->id}が更新されました", $counterparty_user->toArray());
    }
}
