<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
class sliderController extends Controller
{
    public function index()
    { $items = slider::all();
       return view('backend.slider.index', compact('items'));
    }
    public function store(Request $request){
        $item = new slider;
        $this->validate($request,[
            'slider_image'=>'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);
        $item->bold_text = $request->bold_text;
        $item->small_text = $request->small_text;
        if ($request->hasFile('slider_image')){
            $item->image = $request->slider_image->hashName();
           $request->slider_image->move(('assets/frontend/upload/images/slider'), $item->image);
        }
        $item->save();
        session()->flash('message','Slider Created Successfully');
        return redirect()->back();
    }

    public function destroy(Request $request){
        $item = slider::find($request->sliderid);
        @unlink('assets/frontend/upload/images/slider/'.$item->image);
        $item->delete();
        session()->flash('message','Data Deleted Successfully');
        return redirect()->back();
    }

}
