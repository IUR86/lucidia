<?php

namespace App\Enum;

enum PaymentMethod: int
{
    case CARD = 1;        // クレジットカード
    // case KONBINI = 2;     // コンビニ決済
    // case PAYPAY = 3;      // PayPay

    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::CARD => 'クレジットカード',
            // self::KONBINI => 'コンビニ決済',
            // self::PAYPAY => 'PayPay',
        };
    }
}
