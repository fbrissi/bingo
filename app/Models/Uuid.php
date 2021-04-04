<?php

namespace App\Models;

use Ramsey\Uuid\Uuid as RUuid;

trait Uuid
{
    public static function bootUuid()
    {
        static::creating(function ($model) {
            $model->id = RUuid::uuid4();
        });
    }
}
