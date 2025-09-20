<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class OrderItem extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'price',
        'quantity',
        'subtotal',
        'stripe_product_data',
    ];

    /**
     * キャストする属性の取得
     *
     * @return array<string, string>
     */
    protected $casts = [
        'stripe_product_data' => 'array',
    ];

    /**
     * 作成データをセットします
     *
     * @param Order $order
     * @param CartItem $cart_item
     * @return self
     */
    public function setSavingData(Order $order, CartItem $cart_item): self
    {
        $this->order_id = $order->id;
        $this->product_id = $cart_item->id;
        $this->product_name = $cart_item->product->name;
        $this->price = $cart_item->product->price;
        $this->quantity = $cart_item->quantity;
        $this->subtotal = $cart_item->product->price * $cart_item->quantity;

        return $this;
    }
}
