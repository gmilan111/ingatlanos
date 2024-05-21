<?php

namespace App\Http\Controllers;

use App\Models\LikedProperties;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikedPropertiesController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        $liked_properties = Properties::whereHas('liked', function ($query) use($user){
            $query->where([['user_id', $user->id],['sold', '=',false], ['auction','=',false]]);
        })->paginate(9);
        return view('likedprop.index', [
            'properties' => $liked_properties,
        ]);
    }

    public function store($data){
        $user = auth()->id();
        $properties = $data;
        LikedProperties::create([
           'properties_id' => $properties,
           'user_id' => $user,
        ]);

        return back();
    }

    public function destroy($data){
        $record = LikedProperties::where([['properties_id', '=', $data],['user_id','=', auth()->id()]])->first();

        if($record){
            $record->delete();
        }

        /*return view('properties.index', [
            'properties' => DB::table('properties')->select('*')->get(),
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);*/

        return back();
    }

    public function destroy_liked($data){
        $record = LikedProperties::where([['properties_id', '=', $data],['user_id','=', auth()->id()]])->first();

        if($record){
            $record->delete();
        }

        /*return view('properties.index', [
            'properties' => DB::table('properties')->select('*')->get(),
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);*/

        return redirect(route('liked.index'));
    }
}
