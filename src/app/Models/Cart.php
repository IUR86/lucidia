<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

final class Cart extends Model
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'cart';

    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'cart_key',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * 使用中カートを取得
     *
     * @return self|null
     */
    public function getUsingCart(): self|null
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        // カートキーを取得 or Cookieから復元
        $cart_key = session()->get('cart_key') ?? request()->cookie('cart_key');

        if ($cart_key === null) {
            $cart_key = (string) Str::uuid();
            session(['cart_key' => $cart_key]);
            Cookie::queue('cart_key', $cart_key, 60 * 24 * 7); // 7日間保持
        }

        Log::info("カートキー : {$cart_key}");

        // DBから取得 or 新規作成
        $cart = Cart::firstOrCreate(['cart_key' => $cart_key]);

        return $cart;
    }

    /**
     * カートの商品一覧を取得
     *
     * @return HasMany
     */
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
