<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{
    use HasFactory;

    public function auctions_entered(){
        return $this->belongsToMany(User::class, 'auctions_entereds','auctions_id', 'user_id');
    }
    protected $fillable = [
        'properties_id',
        'user_id',
        'price',
        'closed',
        'deadline',
    ];
}
