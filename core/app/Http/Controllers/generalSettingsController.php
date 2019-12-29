<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\generalsetting;
class generalSettingsController extends Controller
{
    public function index(){
        $items = generalsetting::all();
        return view('backend.general-settings.index',compact('items'));
    }
    public function store(Request $request){
        $item = generalsetting::first();
        $item->title = $request->title;
        $item->color = $request->color;
        $item->currency_text = $request->currency_text;
        $item->currency_symbol = $request->currency_symbol;
        $item->conversion_rate = $request->conversion_rate;
        $item->save();
        session()->flash('message','information Updated Successfully');
        return redirect()->back();
    }
}
