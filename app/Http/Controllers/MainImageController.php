<?php

namespace App\Http\Controllers;

use App\Models\MainImage;
use Illuminate\Http\Request;

class MainImageController extends Controller
{
    public static function main_img_show($propertyId) {
        return MainImage::where('properties_id', '=', $propertyId)->first();
    }

    public function destroy($image){
        $record_1 = MainImage::find($image);

        if($record_1){
            $record_1->delete();
        }
        return back();
    }
}
