<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    protected $fillable = [
        "id",
        "name",
        "monitor_size",
        "weight",
        "rom",
        "camera_pixel",
        "has_memory_slot",
        "pic",
        "brand_id",
    ];

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

    public function scopeWithRomSize($query, array $romSizeSelected)
    {
        return (empty($romSizeSelected))
            ? $query
            : $query->whereIn('rom', $romSizeSelected);
    }
}
