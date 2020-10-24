<?php

namespace Malico\MeSomb\Helper;

use Illuminate\Support\Str;

trait ModelUUID
{
    /**
     * Set UUID for newly created Models
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}
