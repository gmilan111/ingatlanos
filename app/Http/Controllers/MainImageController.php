<?php

namespace App\Http\Controllers;

use App\Models\MainImage;
use Illuminate\Http\Request;

class MainImageController extends Controller
{
    public static function main_img_show($propertyId) {
        return MainImage::where('properties_id', '=', $propertyId)->first();
    }
}
