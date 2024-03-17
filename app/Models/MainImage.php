<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'properties_id',
        'main_img',
    ];
}
