<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public static function img_show($propertyId) {
        return Images::where('properties_id', '=', $propertyId)->first();
    }
}
