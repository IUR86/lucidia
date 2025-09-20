<?php

namespace App\Models\Traits\Booted;

use Illuminate\Support\Str;

trait UuidCode
{
    protected static function bootUuidCode()
    {
        static::creating(function ($model) {
            if (empty($model->code)) {
                $model->code = (string) Str::uuid();
            }
        });
    }
}
