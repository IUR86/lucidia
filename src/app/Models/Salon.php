<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $name 名称
 * @property string $description 説明
 * @property int $prefecture 都道府県
 * @property string $postal_code 郵便番号
 * @property string $address1 市区町村
 * @property string $address2 番地・建物名など
 * @property string $latitude 緯度
 * @property string $longitude 軽度
 * @property string $tel 電話番号
 * @property string $email メールアドレス
 * @property string $opening_time 営業開始時間
 * @property string $closing_time 営業終了時間
 * @property string $regular_holiday 定休日
 * @property string $website_url 店舗の公式URL
 * @property int $capacity 予約数
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @property string|null $deleted_at 削除日時
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereClosingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereOpeningTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon wherePrefecture($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereRegularHoliday($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Salon whereWebsiteUrl($value)
 * @mixin \Eloquent
 */
final class Salon extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'counterparty_id',
        'name',
        'description',
        'prefecture',
        'postal_code',
        'address1',
        'address2',
        'latitude',
        'longitude',
        'tel',
        'email',
        'opening_time',
        'closing_time',
        'regular_holiday',
        'website_url',
        'capacity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Counterparty - Salon : 1 - N
     *
     * @return BelongsTo
     */
    public function counterparty(): BelongsTo
    {
        return $this->belongsTo(Counterparty::class);
    }
}
