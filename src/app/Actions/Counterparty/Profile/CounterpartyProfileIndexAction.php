<?php

namespace App\Actions\Counterparty\Profile;

use Illuminate\Support\Facades\Auth;

final class CounterpartyProfileIndexAction
{
    /**
     * 契約情報を取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'counterparty' => Auth::guard('counterparty')->user()
        ];
    }
}
