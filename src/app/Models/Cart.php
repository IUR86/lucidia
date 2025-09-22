<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $cart_key カートキー
 * @property int|null $user_id ユーザID
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CartItem> $cartItems
 * @property-read int|null $cart_items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCartKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cart whereUserId($value)
 * @mixin \Eloquent
 */
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
