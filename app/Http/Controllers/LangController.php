<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function change(Request $request){
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    public function setLocale($lang){
        if(in_array($lang,['en', 'hu'])){
            App:setlocale($lang);
            Session::put('locale', $lang);
        }

        return back();
    }
}
