<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
    public function sendEmail($info){
        $properties = DB::table('properties')->select('*')->where('id', '=', $info)->first();
        $agent = DB::table('users')->select('*')->where('id', '=', $properties->user_id)->first();
        $data = [
            'name' => \request()->name,
            'description' => \request()->description,
        ];
        $url = 'http://otthonvadasz.test/properties/'.$info;
        Mail::to($agent->email)->send(new Contact($data, $url));
        return redirect('/');
    }
}
