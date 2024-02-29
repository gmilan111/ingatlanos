<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PropertiesController extends Controller
{
    public function index()
    {
        return view('properties.index',[
            'properties' => DB::table('properties')->select('*')->get()
        ]);
    }
}
