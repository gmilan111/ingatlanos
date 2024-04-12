<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'settlement',
        'state',
        'size',
        'min_size',
        'max_size',
        'price',
        'min_price',
        'max_price',
        'rooms',
        'min_rooms',
        'max_rooms',
    ];
}
