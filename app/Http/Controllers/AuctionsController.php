<?php

namespace App\Http\Controllers;

use App\Mail\AuctionImmediatePurchase;
use App\Mail\AuctionPurchaseNotification;
use App\Mail\AuctionsOffer;
use App\Mail\ClosedAuction;
use App\Mail\ClosedAuctionWinner;
use App\Models\AuctionList;
use App\Models\Auctions;
use App\Models\AuctionsEntered;
use App\Models\Properties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuctionsController extends Controller
{
    public function index(){
        $auctions = DB::table('auctions')->select('*')->where('closed','=', false)->paginate(12);

        /*if(count($properties_id)>0){
            foreach ($properties_id as $item){
                $properties = DB::table('properties')->select('*')->where('auction', '=', true)->get();
            }
        }*/

        return view('auctions.index', [
            'auctions' => $auctions,
        ]);
    }

    public function show($property_id){
        $properties_info = DB::table('properties')->select('*')->where('id', '=', $property_id)->first();
        $main_img = DB::table('main_images')->select('*')->where('properties_id', '=', $property_id)->get();
        $images = DB::table('images')->select('*')->where('properties_id', '=', $property_id)->get();
        $auction_list_helper = DB::table('auctions')->select('*')->where('properties_id', '=', $property_id)->first();
        $auction_list = DB::table('auction_lists')->select('*')->where('auction_id', '=', $auction_list_helper->id)->get();
       /* $user_id = auth()->id();
        $user = User::find($user_id);

        $user->auction_entered = true;
        $user->save();

        if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m") {
            $user = auth()->id();
            $auction = DB::table('auctions')->select('*')->where('properties_id', '=', $property_id)->first();
            AuctionsEntered::create([
                'auctions_id' => $auction->id,
                'user_id' => $user,
            ]);
        }*/

        return view('auctions.show', [
            'properties_info' => $properties_info,
            'main_img' => $main_img,
            'images' => $images,
            'auction_list' => $auction_list
        ]);
    }

    public function show_own(){
        $user_id = auth()->id();
        $auctions = array();
        $helper = array();
        $properties = DB::table('properties')->select('*')->where('user_id', '=', $user_id)->where('auction', '=', true)->get();

        foreach($properties as $item){
            array_push($helper,$item->id);
        }
        $auctions = DB::table('auctions')->select('*')/*->where('closed','=', false)*/->whereIn('properties_id', $helper)->paginate(12);


        return view('auctions.own', [
            'auctions' => $auctions,
        ]);
    }

    public function bid(Request $request, $property_id){
        $item = Properties::find($property_id);
        $item->auction_price = $request['bid'];
        $user_id = auth()->id();

        $data = [
            'auction_id' => $request['auction_id'],
            'user_id' => $user_id,
            'offer' => $request['bid'],
        ];
        AuctionList::create($data);
        $item->save();

        $auction_id = DB::table('auctions')->select('*')->where('properties_id', '=', $property_id)->first();
        $auction = Auctions::find($auction_id->id);
        $auction->price = $request['bid'];
        $auction->save();

        $agent = DB::table('users')->select('*')->where('id', '=', $item->user_id)->first();
        $user_information = Auth::user();
        $url = 'http://otthonvadasz.test/auctions/'.$property_id;
        Mail::to($agent->email)->send(new AuctionsOffer($item, $user_information, $url));

        return back();
    }

    public function buy($property_id){
        $item = Properties::find($property_id);
        $item->auction_price = $item->immediate_purchase;
        $user_id = auth()->id();

        $auction_id = DB::table('auctions')->select('*')->where('properties_id', '=', $property_id)->first();
        $auction = Auctions::find($auction_id->id);
        $user_information = Auth::user();
        $agent = DB::table('users')->select('*')->where('id', '=', $item->user_id)->first();
        $url = 'http://otthonvadasz.test/auctions/'.$property_id;
        $auction->closed = true;

        $data = [
            'auction_id' => $auction_id->id,
            'user_id' => $user_id,
            'offer' => $item->auction_price,
            'buy_now' => true,
        ];
        AuctionList::create($data);

        $item->save();
        $auction->save();

        Mail::to($agent->email)->send(new AuctionImmediatePurchase($item, $user_information, $url, $agent->name));

        Mail::to($user_information->email)->send(new AuctionPurchaseNotification($item, $user_information, $url));

        $auctions = DB::table('auctions')->select('*')->get();

        return redirect(route('auctions.index'))->with([
            'auctions' => $auctions,
        ]);

    }

    public function search(Request $request)
    {
        $settlement_search = $request['settlement_search'];
        $price_min_search = $request['price_min_search'];
        $price_max_search = $request['price_max_search'];
        $size_min = $request['size_min'];
        $size_max = $request['size_max'];

        $auctions_properties = Properties::query();

        $auctions_properties->select('*')
            ->when($settlement_search != null, function ($auctions_properties) use ($request) {
                $user_id = auth()->id();
                $auctions_properties->where([['settlement', 'like', '%' . $request['settlement_search'] . '%'],['auction', '=', true]]);
            })
            ->when($settlement_search == null, function ($auctions_properties) use ($request) {
                $auctions_properties->where('auction', '=', true);
            });

        $auctions_properties->when($price_max_search != null, function ($auctions_properties) use ($request){
            $auctions_properties->where('price', '<=', $request['price_max_search']);
        });

        $auctions_properties->when($price_min_search != null, function ($auctions_properties) use ($request){
            $auctions_properties->where('price', '>=', $request['price_min_search']);
        });

        $auctions_properties->when($size_max != null, function ($auctions_properties) use ($request){
            $auctions_properties->where('size', '<=', $request['size_max']);
        });

        $auctions_properties->when($size_min != null, function ($auctions_properties) use ($request){
            $auctions_properties->where('size', '>=', $request['size_min']);
        });

        $search = $auctions_properties->get();
        $helper = array();

        foreach($search as $item){
            array_push($helper, $item->id);
        }

        $auctions = DB::table('auctions')->select('*')->whereIn('properties_id', $helper)->get();

        return view('auctions.index', [
            'auctions' => $auctions,
            'settlement_search' => $settlement_search,
            'price_min_search' => $price_min_search,
            'price_max_search' => $price_max_search,
            'size_min' => $size_min,
            'size_max' => $size_max,
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }

    public function own_search(Request $request)
    {
        $settlement_search = $request['settlement_search'];

        $a = Properties::query();

        $a->select('*')
            ->when($settlement_search != null, function ($a) use ($request) {
                $a->where([['settlement', 'like', '%' . $request['settlement_search'] . '%'],['auction', '=', true]]);
            })
            ->when($settlement_search == null, function ($auctions_properties) use ($request) {
                $auctions_properties->where('auction', '=', true);
            });

        $search = $a->get();

        $helper = array();
        foreach ($search as $item){
            array_push($helper,$item->id);
        }

        $auctions = DB::table('auctions')->select('*')->whereIn('properties_id', $helper)->get();

        return view('auctions.own', [
            'auctions' => $auctions,
            'settlement_search' => $settlement_search,
            'images' => DB::table('images')->select('*')->join('properties', 'images.properties_id', '=', 'properties.id')->get(),
        ]);
    }

    public function own_closed($property_id){
        $auction_helper = DB::table('auctions')->select('*')->where('properties_id','=',$property_id)->first();
        $max = DB::table('auction_lists')->select('*')->where([['auction_id', '=', $auction_helper->id],['buy_now', '=', false]])->max('offer');
        $user_helper = DB::table('auction_lists')->select('*')->where([['auction_id', '=', $auction_helper->id],['offer', '=', $max]])->first();
        if(isset($user_helper)) {
            $user = User::find($user_helper->user_id);
            $auction = Auctions::find($auction_helper->id);
            $auction->closed = true;

            $auction->save();

            $url = 'http://otthonvadasz.test/auctions/'.$property_id;

            Mail::to($user->email)->send(new ClosedAuctionWinner($user->name, $max, $url, $property_id));

            $closed_auction = DB::table('auction_lists')->select('*')->where([['user_id', '!=', $user->id], ['offer', '!=', $max]])->where([['auction_id', '=', $auction_helper->id], ['buy_now', '=', false]])->get();
            $loser_user_helper = array();
            foreach ($closed_auction as $value){
                array_push($loser_user_helper, $value->user_id);
            }
            $loser_user = DB::table('users')->select('*')->whereIn('id', $loser_user_helper)->get();
            foreach($loser_user as $item){
                Mail::to($item->email)->send(new ClosedAuction($item->name, $property_id));
            }
        }else{
            $auction = Auctions::find($auction_helper->id);
            $auction->closed = true;

            $auction->save();
        }

        $user_id = auth()->id();
        $helper = array();
        $properties = DB::table('properties')->select('*')->where('user_id', '=', $user_id)->where('auction', '=', true)->get();

        foreach($properties as $item){
            array_push($helper,$item->id);
        }
        $auctions = DB::table('auctions')->select('*')->whereIn('properties_id', $helper)->get();

        return redirect(route('auctions.own'))->with([
            'auctions' => $auctions,
        ]);
    }

    public function closed($property_id){
        $auction_helper = DB::table('auctions')->select('*')->where('properties_id','=',$property_id)->first();
        $max = DB::table('auction_lists')->select('*')->where([['auction_id', '=', $auction_helper->id],['buy_now', '=', false]])->max('offer');
        $user_helper = DB::table('auction_lists')->select('*')->where([['auction_id', '=', $auction_helper->id],['offer', '=', $max]])->first();
        if(isset($user_helper)){
            $user = User::find($user_helper->user_id);
            $auction = Auctions::find($auction_helper->id);
            $auction->closed = true;

            $auction->save();

            $url = 'http://otthonvadasz.test/auctions/'.$property_id;

            Mail::to($user->email)->send(new ClosedAuctionWinner($user->name, $max, $url, $property_id));

            $closed_auction = DB::table('auction_lists')->select('*')->where([['user_id', '!=', $user->id], ['offer', '!=', $max]])->where([['auction_id', '=', $auction_helper->id], ['buy_now', '=', false]])->get();
            $loser_user_helper = array();
            foreach ($closed_auction as $value){
                array_push($loser_user_helper, $value->user_id);
            }
            $loser_user = DB::table('users')->select('*')->whereIn('id', $loser_user_helper)->get();
            foreach($loser_user as $item){
                Mail::to($item->email)->send(new ClosedAuction($item->name, $property_id));
            }
        }else{
            $auction = Auctions::find($auction_helper->id);
            $auction->closed = true;

            $auction->save();
        }

        $auctions = DB::table('auctions')->select('*')->get();

        return redirect(route('auctions.index'))->with([
            'auctions' => $auctions,
        ]);
    }

    public function destroy($property)
    {
        $record = Properties::find($property);

        if ($record) {
            $record->delete();
        }

        return back();
    }
}
