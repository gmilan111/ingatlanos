<?php

namespace App\Http\Controllers;

use App\Models\LikedProperties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikedPropertiesController extends Controller
{
    //

    public function store($data){
        $user = auth()->id();
        $properties = $data;
        LikedProperties::create([
           'properties_id' => $properties,
           'user_id' => $user,
        ]);

        return view('properties.index', [
            'properties' => DB::table('properties')->select('*')->get(),
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }

    public function destroy($data){
        $record = LikedProperties::where([['properties_id', '=', $data],['user_id','=', auth()->id()]])->first();


        if($record){
            $record->delete();
        }

        return view('properties.index', [
            'properties' => DB::table('properties')->select('*')->get(),
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }
}
