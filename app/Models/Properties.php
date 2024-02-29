<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_name',
        'telepules',
        'ar',
        'szobamszam',
        'leiras',
        'utca_hazszam',
        'meret',
        'google_maps',
    ];
}
