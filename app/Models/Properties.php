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
    ];
}
