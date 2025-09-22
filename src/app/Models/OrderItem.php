<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $product_name 商品名
 * @property int $price 単価
 * @property int $quantity 数量
 * @property int $subtotal 小計
 * @property array<array-key, mixed>|null $stripe_product_data Stripeの商品情報(JSON)
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @property string|null $deleted_at 削除日時
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereStripeProductData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
