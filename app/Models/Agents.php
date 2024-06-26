<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'salary',
        'experience',
        'help',
        'language',
        'description',
    ];

    protected $casts = [
        'help' => 'array',
    ];

    protected $primaryKey = 'user_id';
}
