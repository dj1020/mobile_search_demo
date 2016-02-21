<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function scopeWithBrand($query, $brandId)
    {
        return (empty($brandId) || $brandId == 0)
            ? $query
            : $query->where('brand_id', $brandId);
    }
}
