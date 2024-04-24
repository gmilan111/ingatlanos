<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{
    use HasFactory;

    public function liked_auctions(){
        return $this->belongsToMany(User::class, 'liked_auctions','auctions_id', 'user_id');
    }
    protected $fillable = [
        'properties_id',
        'price',
        'closed',
    ];
}
