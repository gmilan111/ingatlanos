<?php

namespace App\Console\Commands;

use App\Http\Controllers\AuctionsController;
use App\Mail\AuctionEnded;
use App\Mail\ClosedAuction;
use App\Mail\ClosedAuctionWinner;
use App\Models\Auctions;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Deadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = DB::table('users')->select('*')->where('is_ingatlanos', '=', 'i')->get();
        $properties = array();
        foreach($users as $user){
            $properties = DB::table('properties')->select('*')->where([['user_id', '=', $user->id],['auction', '=', true]])->get();
        }
        $auction_helper = array();
        foreach($properties as $property){
            array_push($auction_helper, $property->id);
        }

        $auctions = DB::table('auctions')->select('*')->where('closed', '=', false )->whereIn('properties_id', $auction_helper)->get();
        $currentDate = date('Y-m-d');

        foreach ($auctions as $value){
            if($currentDate>$value->deadline){
                $agent = User::find($value->user_id);
                $max =  DB::table('auction_lists')->select('*')->where([['auction_id', '=', $value->id],['buy_now', '=', false]])->max('offer');
                $user_helper = DB::table('auction_lists')->select('*')->where([['auction_id', '=', $value->id],['offer', '=', $max]])->first();
                if(isset($user_helper)){
                    $user = User::find($user_helper->user_id);
                    $auction = Auctions::find($value->id);
                    $auction->closed = true;

                    $auction->save();

                    $url = 'http://otthonvadasz.test/auctions/'.$value->properties_id;
                    Mail::to("gebeimilan@gmail.com")->send(new ClosedAuctionWinner($user->name, $max, $url, $value->properties_id));

                    $closed_auction = DB::table('auction_lists')->select('*')->where([['user_id', '!=', $user->id], ['offer', '!=', $max]])->where([['auction_id', '=', $value->id], ['buy_now', '=', false]])->get();
                    $loser_user_helper = array();
                    foreach ($closed_auction as $item){
                        array_push($loser_user_helper, $item->user_id);
                    }
                    $loser_user = DB::table('users')->select('*')->whereIn('id', $loser_user_helper)->get();
                    foreach($loser_user as $item){
                        Mail::to("gebeimilan@gmail.com")->send(new ClosedAuction($item->name, $value->properties_id));
                    }
                }

                $url = 'http://otthonvadasz.test/auctions/'.$value->properties_id;
                Mail::to("gebeimilan@gmail.com")->send(new AuctionEnded($url, $value->properties_id, $agent->name));
            }
        }
        return 0;
    }
}
