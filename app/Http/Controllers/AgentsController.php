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

    public function show($agent_id){
        $agent = DB::table('agents')->select('*')->where('user_id', '=', $agent_id)->first();
        $help = json_decode($agent->help);
        $agent_helper = explode(',', $help);
        $agent_help = array();
        foreach ($agent_helper as $item){
            $item = str_replace('"', "", $item);
            $item = str_replace('[', "", $item);
            $item = str_replace(']', "", $item);
            array_push($agent_help, $item);
        }

        return view('agents.show', [
            'agents' => DB::table('users')->select('*')->where('id', '=', $agent_id)->get(),
            'agents_info' => DB::table('agents')->select('*')->where('user_id', '=', $agent_id)->get(),
            'agent_help' => $agent_help,
            'properties' => DB::table('properties')->select('*')->where('user_id', '=', $agent_id)->get(),
        ]);
    }
}
