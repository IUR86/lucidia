<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class PasswordResetToken extends Model
{
    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
}
