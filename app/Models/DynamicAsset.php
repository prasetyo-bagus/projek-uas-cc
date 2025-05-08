<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicAsset extends Model
{
    protected $fillable = [
        'type',
        'title',
        'image',
        'description',
        'detail',
        'capacity',
        'duration',
        'price',
        'is_active'
    ];
}
