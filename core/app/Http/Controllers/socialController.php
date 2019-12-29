<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\social;
class socialController extends Controller
{
    public function index(){
        $items = social::all();
        return view('backend.social.index',compact('items'));
    }

    public function store(Request $request){
        $item = new social;
        $this->validate($request,[
            'social_icon'=>'required|unique:socials,icon',
            'social_url'=>'required'
        ]);
        $item->icon = 'fa '.$request->social_icon;
        $item->link = $request->social_url;
        $item->save();
        session()->flash('message','Social item Created Successfully');
        return redirect()->back();
    }

    public function destroy(Request $request){
        $item = social::find($request->socialid);
        $item->delete();
        session()->flash('message','Data Deleted Successfully');
        return redirect()->back();
    }
}
