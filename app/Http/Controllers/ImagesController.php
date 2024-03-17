<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Scalar\String_;

class ImagesController extends Controller
{
    public static function img_show($propertyId) {
        return Images::where('properties_id', '=', $propertyId)->get();
    }

    /*public function img_order_store(Images $images, Request $request){
        $request->validate([
           'is_first' => 'required',
        ]);
        dd($images -> update([
            'is_first' => $request['is_first'],
        ]));

        $images -> update([
            'is_first' => $request['is_first'],
        ]);

        return view('properties.index', [
            'properties' => DB::table('properties')->select('*')->get(),
        ]);

        $formfields = $request['is_first'];
        dd();
        return view('properties.index', [
            'properties' => DB::table('properties')->select('*')->get(),
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->where('images.id', '=', $formfields)->get(),
        ]);
    }*/
}
