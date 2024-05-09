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
            $query->where('user_id', $user->id);
        })->get();
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

    /*public function search_liked(Request $request)
    {
        $settlement_search = $request['settlement_search'];

        $a = Properties::query();

        $a->select('*')
            ->when($settlement_search != null, function ($a) use ($request) {
                $a->where('settlement', 'like', '%' . $request['settlement_search'] . '%');
            });

        $search=$a->get();
        return view('likedprop.index', [
            'properties' => $search,
            'settlement_search' => $settlement_search,
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }*/
}
