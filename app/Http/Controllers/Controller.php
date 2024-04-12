<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == 'm') {
            $user_id = auth()->id();
            $helper = DB::table('recommendations')->select('*')->where('user_id', '=', $user_id)->inRandomOrder()->get();
            $liked_helper = DB::table('liked_properties')->select('*')->join('properties', 'liked_properties.properties_id', '=', 'properties.id')->where('liked_properties.user_id', '=', $user_id)->inRandomOrder()->get();
            if(count($helper) < 1 && count($liked_helper) < 1){
                $non_reg_prop = DB::table('properties')->select('*')->inRandomOrder()->get();
                return view('index',[
                    'properties' => $non_reg_prop,
                    'igaz' => true,
                ]);
            }
            $settlement = array();
            $states_helper = array();
            foreach ($helper as $item) {
                $settlement[] = $item->settlement;
                $states_helper[] = $item->state;
                if ($item->min_size != null) {
                    $min_size_helper[] = $item->min_size;
                }
                if ($item->max_size != null) {
                    $max_size_helper[] = $item->max_size;
                }
                if ($item->min_price != null) {
                    $min_price_helper[] = $item->min_price;
                }
                if ($item->max_price != null) {
                    $max_price_helper[] = $item->max_price;
                }
                if ($item->min_rooms != null) {
                    $min_rooms_helper[] = $item->min_rooms;
                }
                if ($item->max_rooms != null) {
                    $max_rooms_helper[] = $item->max_rooms;
                }
            }
            foreach ($liked_helper as $item) {
                $settlement[] = $item->settlement;

                if ($item->size != null) {
                    $max_size_helper[] = $item->size;
                    if($item->size == 1){
                        $min_size_helper[] = $item->size;
                    }else{
                        $min_size_helper[] = $item->size - 1;
                    }
                }
                if ($item->price != null) {
                    $max_price_helper[] = $item->price;
                    $min_price_helper[] = $item->price - 1;
                }
                if ($item->rooms != null) {
                    $max_rooms_helper[] = $item->rooms;
                    if($item->size == 1){
                        $min_rooms_helper[] = $item->rooms;
                    }else{
                        $min_rooms_helper[] = $item->rooms - 1;
                    }
                }
            }

            $min_size = min($min_size_helper);
            $max_size = max($max_size_helper);
            $min_price = min($min_price_helper);
            $max_price = max($max_price_helper);
            $min_rooms = min($min_rooms_helper);
            $max_rooms = max($max_rooms_helper);


            $states = array();
            foreach ($states_helper as $value) {
                if ($value != null) {
                    if (!str_contains($value, ',')) {
                        array_push($states, $value);
                    } else {
                        $aua = explode(',', $value);
                        foreach ($aua as $item) {
                            array_push($states, $item);
                        }
                    }
                }
            }

            $properties = Properties::query();

            $properties->select('*')
                ->when($settlement != null, function ($properties) use ($settlement) {
                    $properties->whereIn('settlement', $settlement);
                });

            /*$properties->when(function ($properties) use ($states) {

                $properties->whereIn('state', $states);
            });*/



            $properties->when($min_size != null, function ($properties) use ($min_size) {
                $properties->where('size', '>=', $min_size);
            });

            $properties->when($max_size != null, function ($properties) use ($max_size) {
                $properties->where('size', '<=', $max_size);
            });

            $properties->when($min_price != null, function ($properties) use ($min_price) {
                $properties->where('price', '>=', $min_price);
            });

            $properties->when($max_price != null, function ($properties) use ($max_price) {
                $properties->where('price', '<=', $max_price);
            });

            $properties->when($min_rooms != null, function ($properties) use ($min_rooms) {
                $properties->where('rooms', '>=', $min_rooms);
            });

            $properties->when($max_rooms != null, function ($properties) use ($max_rooms) {
                $properties->where('rooms', '<=', $max_rooms);
            });



            $recommendations = $properties->get();
            return view('index', [
                'recommendations' => $recommendations,
                'igaz' => false,
            ]);
        }

        $non_reg_prop = DB::table('properties')->select('*')->inRandomOrder()->get();
        return view('index',[
            'properties' => $non_reg_prop,
            'igaz' => false,
        ]);
    }
}
