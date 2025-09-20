<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Product extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'type',
        'stripe_product_id',
        'stripe_price_id',
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
