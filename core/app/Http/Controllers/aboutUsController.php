<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUs;
class aboutUsController extends Controller
{
   public function index(){
      $item = AboutUs::first();
       return view('backend.about-us.index', compact('item'));
   }

   public function store(Request $request){
       $item = AboutUs::first();
       if(!count($item)){
           $item = new AboutUs();
           $this->validate($request,[
               'title'=>'required',
               'about_text'=>'required',
           ]);
           $item->title = $request->title;
           $item->description = $request->about_text;
           $item->save();
           session()->flash('message','Information Updated Successfully');
           return redirect()->back();
       }else {
               $this->validate($request,[
                   'title'=>'required',
                   'about_text'=>'required',
               ]);
           $item->title = $request->title;
           $item->description = $request->about_text;
           $item->save();
           session()->flash('message', 'Information Updated Successfully');
           return redirect()->back();
       }
   }
}
