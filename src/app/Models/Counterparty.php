<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
