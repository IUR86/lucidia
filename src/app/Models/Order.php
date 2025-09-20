<?php

namespace App\Models;

use App\Models\Traits\Booted\OrderAt;
use App\Models\Traits\Booted\UserId;
use App\Models\Traits\Booted\UuidCode;
use Illuminate\Database\Eloquent\Model;

final class Order extends Model
{
    use UuidCode, UserId, OrderAt;

    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'currency',
        'amount_subtotal',
        'amount_total',
        'payment_method',
        'payment_card_brand',
        'payment_card_last4',
        'payment_status',
        'stripe_checkout_session_id',
        'stripe_payment_intent_id',
        'stripe_response',
        'order_at',
    ];

    /**
     * キャストする属性の取得
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'stripe_response' => 'array',
        ];
    }
}
