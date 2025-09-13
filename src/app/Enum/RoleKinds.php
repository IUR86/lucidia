<?php

namespace App\Enum;

enum RoleKinds: int
{
    case ADMIN = 0;

    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => '管理者'
        };
    }
}
