<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $table = 'tb_ads';

    protected $fillable = ['nama', 'pesan', 'rating', 'g-recaptcha-response'];
}
