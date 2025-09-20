<?php

namespace App\Models\Traits\Booted;

use Illuminate\Support\Facades\Auth;

trait UserId
{
    protected static function bootUserId()
    {
        static::creating(function ($model) {
            if (empty($model->user_id)) {
                $model->user_id = Auth::guard('user')->user()->id;
            }
        });
    }
}