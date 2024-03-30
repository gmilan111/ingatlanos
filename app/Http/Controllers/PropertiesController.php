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
            'state' => ['required'],
            'address' => ['required'],
            'district' => 'nullable|integer',
            'size' => ['required'],
            'bathrooms' => ['required'],
            'rooms' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'condition' => 'nullable|string',
            'year_construction' => 'nullable|string',
            'comfort' => 'nullable|string',
            'floor' => 'nullable|integer',
            'building_levels' => 'nullable|integer',
            'lift' => ['required'],
            'inner_height' => 'nullable|integer',
            'air_conditioner' => ['required'],
            'accessible' => ['required'],
            'attic' => 'nullable|string',
            'balcony' => 'nullable|integer',
            'parking' => 'nullable|string',
            'parking_price' => 'nullable|integer',
            'avg_gas' => 'nullable|integer',
            'avg_electricity' => 'nullable|integer',
            'overhead_cost' => 'nullable|integer',
            'common_cost' => 'nullable|integer',
            'heating' => 'nullable|string',
            'insulation' => 'nullable|string',
            'type' => 'nullable|integer',
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
            'agents' => DB::table('users')->select('*')->join('properties', 'users.id', '=', 'properties.user_id')->where('users.is_ingatlanos', '=', 'i')->first(),
        ]);
    }

    public function show_own()
    {
        $user = auth()->id();
        return view('properties.own', [
            'properties' => DB::table('properties')->select('*')->where('user_id', '=', $user)->get()
        ]);

    }

    public function edit($property)
    {
        $item = Properties::find($property);
        return view('properties.edit', compact('item'));
    }

    public function update(Request $request, $property)
    {
        $item = Properties::find($property);
        $item->settlement = $request['settlement'];
        $item->state = $request['state'];
        $item->address = $request['address'];
        $item->district = $request['district'];
        $item->size = $request['size'];
        $item->rooms = $request['rooms'];
        $item->bathrooms = $request['bathrooms'];
        $item->price = $request['price'];
        $item->description = $request['description'];
        $item->condition = $request['condition'];
        $item->year_construction = $request['year_construction'];
        $item->floor = $request['floor'];
        $item->building_levels = $request['building_levels'];
        $item->lift = $request['lift'];
        $item->inner_height = $request['inner_height'];
        $item->air_conditioner = $request['air_conditioner'];
        $item->accessible = $request['accessible'];
        $item->attic = $request['attic'];
        $item->balcony = $request['balcony'];
        $item->parking = $request['parking'];
        $item->parking_price = $request['parking_price'];
        $item->avg_gas = $request['avg_gas'];
        $item->avg_electricity = $request['avg_electricity'];
        $item->overhead_cost = $request['overhead_cost'];
        $item->common_cost = $request['common_cost'];
        $item->heating = $request['heating'];
        $item->insulation = $request['insulation'];
        $item->energy = $request['energy'];

        $item->save();
        return redirect(route('properties.own'));
    }

    public function destroy($property)
    {
        $record = Properties::find($property);

        if ($record) {
            $record->delete();
        }

        return redirect(route('properties.index'));
    }

    public function search(Request $request)
    {
        $settlement_search = $request['settlement_search'];
        $price_min_search = $request['price_min_search'];
        $price_max_search = $request['price_max_search'];
        $rooms_min_search = $request['rooms_min_search'];
        $rooms_max_search = $request['rooms_max_search'];

        $a = Properties::query();

        $a->select('*')
            ->when($settlement_search != null, function ($a) use ($request) {
                $a->where('settlement', 'like', '%' . $request['settlement_search'] . '%');
            });

        $a->when($price_min_search != null, function ($a) use ($request) {
                $a->where('price', '>=', $request['price_min_search']);
            });


        $a->when($price_max_search != null, function ($a) use ($request) {
                $a->where('price', '<=', $request['price_max_search']);
            });


        $a->when($rooms_min_search != null, function ($a) use ($request) {
                $a->where('rooms', '>=', $request['rooms_min_search']);
            });

        $a->when($rooms_max_search != null, function ($a) use ($request) {
                $a->where('rooms', '<=', $request['rooms_max_search']);
            });

        $search=$a->get();
        return view('properties.index', [
            'properties' => $search,
            'settlement_search' => $request['settlement_search'],
            'price_min_search' => $request['price_min_search'],
            'price_max_search' => $request['price_max_search'],
            'rooms_min_search' => $request['rooms_min_search'],
            'rooms_max_search' => $request['rooms_max_search'],
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }
}
