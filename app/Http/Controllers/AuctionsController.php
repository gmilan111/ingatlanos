<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuctionsController extends Controller
{
    public function index(){
        $properties_id = DB::table('auctions')->select('*')->get();

        if(count($properties_id)>0){
            foreach ($properties_id as $item){
                $properties = DB::table('properties')->select('*')->where('auction', '=', true)->get();
            }
        }


        return view('auctions.index', [
            'properties' => $properties,
        ]);
    }

    public function show($property_id){
        $properties_info = DB::table('properties')->select('*')->where('id', '=', $property_id)->first();
        $main_img = DB::table('main_images')->select('*')->where('properties_id', '=', $property_id)->get();
        $images = DB::table('images')->select('*')->where('properties_id', '=', $property_id)->get();

        return view('auctions.show', [
            'properties_info' => $properties_info,
            'main_img' => $main_img,
            'images' => $images,
        ]);
    }

    public function show_own(){
        $user_id = auth()->id();
        $properties = DB::table('properties')->select('*')->where('user_id', '=', $user_id)->where('auction', '=', true)->get();

        return view('auctions.own', [
            'properties' => $properties,
        ]);
    }
}
