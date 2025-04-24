<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'category', 'body', 'url', 'picture', 'status', 'is_featured'];


    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISH');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
