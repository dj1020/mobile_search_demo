<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
