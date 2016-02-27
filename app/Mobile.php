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

    public function hasReleased()
    {
        return (int)$this->released === 1;
    }

    public function release()
    {
        $this->released = 1;
        $this->save();
    }

    public function unrelease()
    {
        $this->released = 0;
        $this->save();
    }
}
