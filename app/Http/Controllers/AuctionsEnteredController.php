<?php

namespace App\Http\Controllers;

use App\Models\Auctions;
use App\Models\AuctionsEntered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuctionsEnteredController extends Controller
{
    public function index(){
        $user = Auth::user();
        $liked_auctions = Auctions::whereHas('auctions_entered', function ($query) use($user){
            $query->where('user_id', $user->id);
        })->get();
        $helper = array();

        foreach ($liked_auctions as $value){
            array_push($helper, $value->properties_id);
        }
        $properties = DB::table('properties')->select('*')->whereIn('id', $helper)->get();
        return view('auctions_entered.index', [
            'properties' => $properties,
        ]);
    }

    public function store($data){
        $user_id = auth()->id();
        $user = User::find($user_id);
        $user->auction_entered = true;

        $auction = $data;
        AuctionsEntered::create([
            'auctions_id' => $auction,
            'user_id' => $user_id,
        ]);

        $user->save();
        $auctions = DB::table('auctions')->select('*')->get();

        return redirect(route('auctions.index'))->with([
            'auctions' => $auctions,
        ]);

    }

    public function destroy($data){
        $record = AuctionsEntered::where([['auctions_id', '=', $data],['user_id','=', auth()->id()]])->first();

        $user_id = auth()->id();
        $user = User::find($user_id);
        $user->auction_entered = false;

        $user->save();

        if($record){
            $record->delete();
        }

        $auctions = DB::table('auctions')->select('*')->get();

        return redirect(route('auctions.index'))->with([
            'auctions' => $auctions,
        ]);
    }
}
