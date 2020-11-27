<?php

namespace App\Casts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Dates implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return Carbon::parse($value . ' 23:59:59');
    }

    public function set($model, $key, $value, $attributes)
    {
        return $value;
    }
}
