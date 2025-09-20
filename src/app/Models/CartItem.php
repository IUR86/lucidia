<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class CartItem extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at',
    ];

    /**
     * カートアイテムに商品を追加
     *
     * @param Cart $cart
     * @param Product $product
     * @param integer $quantity
     * @return void
     */
    public function add(Cart $cart, Product $product, int $quantity): void
    {
        $cartItem = $this->where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $this->cart_id = $cart->id;
            $this->product_id = $product->id;
            $this->quantity = $quantity;
            $this->save();
        }
    }

    /**
     * 商品情報を取得
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
