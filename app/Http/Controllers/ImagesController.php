<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\MainImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\String_;

class ImagesController extends Controller
{
    public static function img_show($propertyId) {
        return Images::where('properties_id', '=', $propertyId)->get();
    }

    public function store(Request $request, $propertyID)
    {
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'property_images/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $file_name = $image_url;
                Images::create([
                    'properties_id' => $propertyID,
                    'images' => $file_name,
                ]);
            }
        }
        if ($main_img = $request->file('main_img')) {
            $main_image_name = md5(rand(1000, 10000));
            $main_ext = strtolower($main_img->getClientOriginalExtension());
            $main_image_full_name = $main_image_name . '.' . $main_ext;
            $main_upload_path = 'property_main_images/';
            $main_image_url = $main_upload_path . $main_image_full_name;
            $main_img->move($main_upload_path, $main_image_full_name);
            $main_file_name = $main_image_url;
            MainImage::create([
                'properties_id' => $propertyID,
                'main_img' => $main_file_name,
            ]);
        }

        return back();
    }

    public function edit($property){
        return view('images.edit',[
            'propertyID' => $property,
            'images' => DB::table('images')->select('*')->where('properties_id', '=', $property)->get(),
            'main_img' => DB::table('main_images')->select('*')->where('properties_id', '=', $property)->get(),
         ]);
    }

    public function destroy($image){
        $record_1 = Images::find($image);

        if($record_1 && file_exists($record_1->images)){
            $record_1->delete();
            unlink($record_1->images);
        }
        return back();
    }
}
