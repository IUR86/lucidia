<?php

namespace App\Actions\Admin\Home;

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
        $salon_count = Salon::where('deleted_at', null)->count();

        return [
            'salon_count' => $salon_count,
        ];
    }
}
