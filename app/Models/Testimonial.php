<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'pesan',
        'rating',
        'status', // 'pending', 'approved', 'rejected'
        'kota',
        'foto',
    ];

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
} 