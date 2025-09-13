<?php

namespace App\Actions\Admin\Role;

use App\Models\Role;

final class AdminRoleIndexAction
{
    /**
     * 権限一覧を取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        $role = new Role();
        $role_paginate = $role->query()->paginate();

        return [
            'role_paginate' => $role_paginate
        ];
    }
}