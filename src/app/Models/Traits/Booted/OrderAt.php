<?php

namespace App\Models\Traits\Booted;

trait OrderAt
{
    protected static function bootOrderAt()
    {
        static::creating(function ($model) {
            if (empty($model->order_at)) {
                $model->order_at = now();
            }
        });
    }
}
