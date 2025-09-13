<?php

namespace App\Actions\Admin\Salon;

use App\Models\Salon;

final class AdminSalonIndexAction
{
    /**
     * サロン一覧をします
     *
     * @return array
     */
    public function __invoke(): array
    {
        $salon = new Salon();
        $salon_paginate = $salon->query()->paginate();

        return [
            'salon_paginate' => $salon_paginate
        ];
    }
}
