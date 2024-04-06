<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentsController extends Controller
{
    //

    public function index(){
        return view('agents.index',[
            'agents' => DB::table('users')->select('*')->where('is_ingatlanos', '=', 'i')->get()
        ]);
    }

    public function show($agent){
        return view('agents.show', [
            'agents' => DB::table('users')->select('*')->where('id', '=', $agent)->get(),
            'agents_info' => DB::table('agents')->select('*')->where('user_id', '=', $agent)->get(),
            'properties' => DB::table('properties')->select('*')->where('user_id', '=', $agent)->get(),
        ]);
    }
}
