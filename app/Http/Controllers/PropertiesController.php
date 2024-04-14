<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\MainImage;
use App\Models\Properties;
use App\Models\Recommendations;
use DeepCopy\Matcher\PropertyTypeMatcher;
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
            'inner_height' => 'nullable|string',
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
            'type' => 'nullable|string',
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
            /*'agents' => DB::table('users')->select('*')->join('properties', 'users.id', '=', 'properties.user_id')->first(),*/
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
        $item->type = $request['type'];

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
        $size_min = $request['size_min'];
        $size_max = $request['size_max'];
        $bathrooms_min = $request['bathrooms_min'];
        $bathrooms_max = $request['bathrooms_max'];
        $states = $request['state'];
        $condition = $request['condition'];
        $floor_min = $request['floor_min'];
        $floor_max = $request['floor_max'];
        $type = $request['type'];
        $lift = $request['lift'];
        $inner_height = $request['inner_height'];
        $air_conditioner = $request['air_conditioner'];
        $accessible = $request['accessible'];
        $parking = $request['parking'];
        $heating = $request['heating'];

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

        $a->when($size_min != null, function ($a) use ($request) {
                $a->where('size', '>=', $request['size_min']);
            });

        $a->when($size_max != null, function ($a) use ($request) {
                $a->where('size', '<=', $request['size_max']);
            });

        $a->when($bathrooms_min != null, function ($a) use ($request) {
                $a->where('bathrooms', '>=', $request['bathrooms_min']);
            });

        $a->when($bathrooms_max != null, function ($a) use ($request) {
                $a->where('bathrooms', '<=', $request['bathrooms_max']);
            });

        $a->when($states != null, function ($a) use ($request) {
                $states = $request['state'];

                $a->whereIn('state', $states);
            });

        $a->when($condition != null, function ($a) use ($request) {
                $conditions = $request['condition'];

                $a->whereIn('condition', $conditions);
            });

        $a->when($floor_min != null && $floor_min != "Mindegy", function ($a) use ($request) {
            $a->where('floor', '>=', $request['floor_min']);
        });

        $a->when($floor_max != null  && $floor_min != "Mindegy", function ($a) use ($request) {
            $a->where('floor', '<=', $request['floor_max']);
        });

        $a->when($type != null && $type != "Mindegy", function ($a) use ($request) {
                $a->where('type', 'like', $request['type']);
            });

        $a->when($lift != null && $lift != "Mindegy", function ($a) use ($request) {
                $a->where('lift', 'like', $request['lift']);
            });

        $a->when($inner_height != null && $inner_height != "Mindegy", function ($a) use ($request) {
                $a->where('inner_height', 'like', $request['inner_height']);
            });

        $a->when($air_conditioner != null && $air_conditioner != "Mindegy", function ($a) use ($request) {
                $a->where('air_conditioner', 'like', $request['air_conditioner']);
            });

        $a->when($accessible != null && $accessible != "Mindegy", function ($a) use ($request) {
                $a->where('accessible', 'like', $request['accessible']);
            });

        $a->when($parking != null, function ($a) use ($request) {
            $parking = $request['parking'];

            $a->whereIn('parking', $parking);
        });

        $a->when($heating != null, function ($a) use ($request) {
            $heating = $request['heating'];

            $a->whereIn('heating', $heating);
        });

        $user_id = auth()->id();

        if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m"){
            if(isset($states)) {
                Recommendations::create([
                    'user_id' => $user_id,
                    'settlement' => $settlement_search,
                    'state' => implode(',', $states),
                    'min_size' => $size_min,
                    'max_size' => $size_max,
                    'min_price' => $price_min_search,
                    'max_price' => $price_max_search,
                    'min_rooms' => $rooms_min_search,
                    'max_rooms' => $rooms_max_search,
                ]);
            }else{
                Recommendations::create([
                    'user_id' => $user_id,
                    'settlement' => $settlement_search,
                    'min_size' => $size_min,
                    'max_size' => $size_max,
                    'min_price' => $price_min_search,
                    'max_price' => $price_max_search,
                    'min_rooms' => $rooms_min_search,
                    'max_rooms' => $rooms_max_search,
                ]);
            }
        }

        $search=$a->get();
        return view('properties.index', [
            'properties' => $search,
            'settlement_search' => $settlement_search,
            'price_min_search' => $price_min_search,
            'price_max_search' => $price_max_search,
            'rooms_min_search' => $rooms_min_search,
            'rooms_max_search' => $rooms_max_search,
            'size_min' => $size_min,
            'size_max' => $size_max,
            'bathrooms_min' => $bathrooms_min,
            'bathrooms_max' => $bathrooms_max,
            'states' => $states,
            'condition' => $condition,
            'floor_min' => $floor_min,
            'floor_max' => $floor_max,
            'type' => $type,
            'lift' => $lift,
            'inner_height' => $inner_height,
            'air_conditioner' => $air_conditioner,
            'accessible' => $accessible,
            'parking' => $parking,
            'heating' => $heating,
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }

    public function own_search(Request $request)
    {
        $settlement_search = $request['settlement_search'];

        $a = Properties::query();


        $a->select('*')
            ->when($settlement_search != null, function ($a) use ($request) {
                $user_id = auth()->id();
                $a->where([['settlement', 'like', '%' . $request['settlement_search'] . '%'],['user_id', '=', $user_id]]);
            });

        $search=$a->get();

        return view('properties.own', [
            'properties' => $search,
            'settlement_search' => $settlement_search,
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }

    public function sold($property_id){
        $property = Properties::find($property_id);
        $property->sold = true;

        $property->save();

        return redirect(route('properties.own'));
    }
}
