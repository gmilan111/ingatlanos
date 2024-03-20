<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\MainImage;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;
use function Livewire\on;

class PropertiesController extends Controller
{
    public function index()
    {
        return view('properties.index', [
            'properties' => DB::table('properties')->select('*')->get(),
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }

    public function store_index()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'settlement' => ['required', 'min:3'],
            'address' => ['required'],
            'district',
            'size' => ['required'],
            'bathrooms' => ['required'],
            'rooms' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
        ]);

        $formfields['user_id'] = auth()->id();

        $newProperty = Properties::create($formfields);

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
                    'properties_id' => $newProperty->id,
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
                'properties_id' => $newProperty->id,
                'main_img' => $main_file_name,
            ]);
        }


        /*if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $img_name = md5(rand(1000, 10000)) . '.' . $image->extension();
                $image->storeAs('property_images' , $img_name);

                Images::create([
                        'properties_id' => $newProperty->id,
                        'images' => $image,
                    ]
                );
            }
        }*/

        /*return view('properties.index', [
                'properties' => DB::table('properties')->select('*')->get(),
                'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
                'main_img' => DB::table('main_images')->select('*')->join('properties', 'main_images.properties_id', '=', 'properties.id')->get(),
            ]
        , ['img_order'=>$newProperty['id']]);*/
        return redirect(route('properties.index'))->with([
            'properties' => DB::table('properties')->select('*')->get(),
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->where('images.properties_id', '=', 'properties.id')->get(),
            'main_img' => DB::table('main_images')->select('*')->join('properties', 'main_images.properties_id', '=', 'properties.id')->get(),
            ]);
    }

    public function show($property)
    {
        return view('properties.show', [
            'properties' => DB::table('properties')->select('*')->where('properties.id', '=', $property)->get(),
            'images' => DB::table('images')->select('*')->where('images.properties_id', '=', $property)->get(),
            'main_img' => DB::table('main_images')->select('*')->where('main_images.properties_id', '=', $property)->get(),
            'agents' => DB::table('users')->select('*')->join('properties', 'users.id','=', 'properties.user_id')->where('users.is_ingatlanos', '=', 'i')->first(),
        ]);
    }

    public function show_own()
    {
        $user = auth()->id();
        return view('properties.own', [
            'properties' => DB::table('properties')->select('*')->where('user_id', '=', $user)->get()
        ]);

    }

    public function edit($property){
        return view('properties.edit');
    }

    public function destroy($property){
        $record = Properties::find($property);

        if($record){
            $record->delete();
        }

        return redirect(route('properties.index'));
    }
}
