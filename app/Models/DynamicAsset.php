<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DynamicAsset extends Model
{
    protected $fillable = [
        'type',
        'title',
        'image',
        'description',
        'detail',
        // 'capacity',
        // 'duration',
        // 'price',
        'weekday_price',
        'weekend_price',
        'is_active',
        'category',
        'icon',
        'service_items'
    ];

    /**
     * Get the service items as decoded JSON.
     */
    protected function serviceItems(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? json_decode($value, true) : [],
            set: fn ($value) => is_array($value) ? json_encode($value) : $value,
        );
    }
}