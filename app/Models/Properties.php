<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'settlement',
        'price',
        'rooms',
        'description',
        'address',
        'size',
        'district',
        'bathrooms',
    ];
}
