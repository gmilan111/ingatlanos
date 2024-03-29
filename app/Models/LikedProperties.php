<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedProperties extends Model
{
    use HasFactory;

    protected $fillable = [
        'properties_id',
        'user_id',
    ];
}
