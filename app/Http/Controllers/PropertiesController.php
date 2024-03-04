<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PropertiesController extends Controller
{
    public function index()
    {
        return view('properties.index',[
            'properties' => DB::table('properties')->select('*')->get()
        ]);
    }

    public function store_index(){
        return view('properties.create');
    }

    public function store(Request $request){
        $formfields = $request->validate([
            'settlement' => ['required', 'min:3'],
            'address' => ['required'],
            'district',
            'size' => ['required'],
            'bathrooms' => ['required'],
            'rooms' => ['required'],
            'price' => ['required'],
            'description' => ['required']
        ]);

        $formfields['user_id'] = auth()->id();

        Properties::create($formfields);
        return redirect('/properties');
    }

    public function show($property){
        return view('properties.show',[
        'properties' => DB::table('properties')->select('*')->where('id','=',$property)->get()
        ]);
    }

    public function show_own(){
        $user = auth()->id();
        return view('properties.own',[
            'properties' => DB::table('properties')->select('*')->where('user_id','=',$user)->get()
        ]);

    }
}
