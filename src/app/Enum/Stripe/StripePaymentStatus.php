<?php

namespace App\Enum\Stripe;

enum StripePaymentStatus: string {
    case PAID = 'paid';
    case UNPAID = 'unpaid';
    case NO_PAYMENT_REQUIRED = 'no_payment_required';

    /**
     * ラベル
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::PAID                  => '支払い完了',
            self::UNPAID                => '未払い',
            self::NO_PAYMENT_REQUIRED   => '支払い不要',
        };
    }
}