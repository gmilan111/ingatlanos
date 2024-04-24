<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use App\Models\LikedAuctions;
use App\Models\LikedProperties;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikedAuctionsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $liked_auctions = Auctions::whereHas('liked_auctions', function ($query) use($user){
            $query->where('user_id', $user->id);
        })->get();
        $properties = array();

        foreach ($liked_auctions as $value){
            $properties = DB::table('properties')->select('*')->where('id', '=', $value->properties_id)->get();
        }
        return view('likedauctions.index', [
            'properties' => $properties,
        ]);
    }

    public function store($data){
        $user = auth()->id();
        $auction = $data;
        LikedAuctions::create([
            'auctions_id' => $auction,
            'user_id' => $user,
        ]);

        return back();
    }

    public function destroy($data){
        $record = LikedAuctions::where([['auctions_id', '=', $data],['user_id','=', auth()->id()]])->first();


        if($record){
            $record->delete();
        }

        return back();
    }

    public function destroy_liked($data){
        $record = LikedAuctions::where([['auctions_id', '=', $data],['user_id','=', auth()->id()]])->first();


        if($record){
            $record->delete();
        }

        return back();
    }
}
