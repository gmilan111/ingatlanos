<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    public function liked(){
        return $this->belongsToMany(User::class, 'liked_properties','properties_id', 'user_id');
    }

    protected $fillable = [
        'user_id',
        'settlement',
        'state',
        'price',
        'rooms',
        'description',
        'address',
        'size',
        'district',
        'bathrooms',
        'condition',
        'year_construction',
        'floor',
        'building_levels',
        'lift',
        'inner_height',
        'air_conditioner',
        'accessible',
        'attic',
        'balcony',
        'parking',
        'parking_price',
        'avg_gas',
        'avg_electricity',
        'overhead_cost',
        'common_cost',
        'heating',
        'insulation',
        'type',
        'sold',
        'furniture',
        'smoking',
        'animal',
        'sale_rent',
        'auction',
        'deposit',
        'immediate_purchase',
        'auction_price',
    ];
}
