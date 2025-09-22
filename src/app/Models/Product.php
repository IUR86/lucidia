<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code コード
 * @property string $stripe_product_id stripe商品ID
 * @property string $stripe_price_id stripe料金ID
 * @property string $name 商品名
 * @property int $price 料金
 * @property int $type タイプ
 * @property int $active 有効フラグ
 * @property string|null $description 商品説明
 * @property string|null $metadata メタデータ
 * @property string|null $images 画像
 * @property string|null $currency 通貨
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @property string|null $deleted_at 削除日時
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStripePriceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStripeProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
