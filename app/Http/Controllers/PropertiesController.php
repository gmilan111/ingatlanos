<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{
    public function index()
    {
        return view('properties.index', [
            'properties' => DB::table('properties')->select('*')->get()
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

        /*$image = array();
        $upload_path = 'public/property_images/';
        if ($files = $request['images']) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $image_full_name = $image_name . '.' . $ext;
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path . $image_full_name);
                $image[] = $image_url;
            }

        }*/
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $img_name = md5(rand(1000, 10000)) . '.' . $image->extension();
                $image->move(public_path('property_images'), $img_name);
                Images::create([
                        'properties_id' => $newProperty->id,
                        'images' => $image,
                    ]
                );
            }
        }

        /*Images::insert([
            'images' => implode('|', $image),
            'properties_id' => $newProperty->id,
        ]);*/
        return redirect('/properties');
    }

    public function show($property)
    {
        return view('properties.show', [
            'properties' => DB::table('properties')->select('*')->where('id', '=', $property)->get()
        ]);
    }

    public function show_own()
    {
        $user = auth()->id();
        return view('properties.own', [
            'properties' => DB::table('properties')->select('*')->where('user_id', '=', $user)->get()
        ]);

    }
}
