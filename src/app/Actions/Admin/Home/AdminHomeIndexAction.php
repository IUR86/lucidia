<?php

namespace App\Actions\Admin\Home;

use App\Models\Counterparty;
use App\Models\Salon;

final class AdminHomeIndexAction
{
    /**
     * Home画面のデータを取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        $counterparty_count = Counterparty::where('deleted_at', null)->count();
        $salon_count = Salon::where('deleted_at', null)->count();

        return [
            'counterparty_count' => $counterparty_count,
            'salon_count' => $salon_count,
        ];
    }
}
