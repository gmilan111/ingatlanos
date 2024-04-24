<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedAuctions extends Model
{
    use HasFactory;
    protected $fillable = [
        'auctions_id',
        'user_id',
    ];
}
