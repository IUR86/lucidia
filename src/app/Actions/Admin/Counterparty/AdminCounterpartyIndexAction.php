<?php

namespace App\Actions\Admin\Counterparty;

use App\Models\Counterparty;

final class AdminCounterpartyIndexAction
{
    /**
     * 契約相手一覧を取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        $counterparty = new Counterparty();
        $ncounterparty_paginate = $counterparty->query()->paginate();

        return [
            'counterparty_paginate' => $ncounterparty_paginate
        ];
    }
}
