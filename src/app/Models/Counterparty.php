<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $name 契約相手
 * @property string $email メールアドレス
 * @property string $password パスワード
 * @property string $subdomain サブドメイン
 * @property int $price 料金
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @property string|null $deleted_at 削除日時
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty whereSubdomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Counterparty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class Counterparty extends Authenticatable
{
    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'counterparty';

    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'subdomain',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * シリアル下のさいに、隠す属性
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
    ];
}
