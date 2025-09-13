<?php

namespace App\Actions\Admin\Counterparty;

use App\Http\Requests\Admin\Counterparty\AdminCounterpartyRequest;
use App\Models\Counterparty;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

final class AdminCounterpartyStoreAction
{
    /**
     * 契約相手の作成
     *
     * @param AdminCounterpartyRequest $request
     * @return void
     */
    public function __invoke(AdminCounterpartyRequest $request): void
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $counterparty = new Counterparty();
        $counterparty->fill($request->validated());
        $counterparty->password = Hash::make($request->get('password'));
        $counterparty->save();

        Log::info("契約相手が登録されました", $counterparty->toArray());
    }
}
