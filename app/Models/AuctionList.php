<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionList extends Model
{
    use HasFactory;

    protected $fillable = [
        'auction_id',
        'user_id',
        'offer',
    ];
}
