<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Image;
use Illuminate\Http\Request;

class sponsorController extends Controller
{
    public function index(){
        $items = Sponsor::all();
        return view('backend.sponsor.index', compact('items'));
    }

    public function store(Request $request){
        $item = new Sponsor();
        $this->validate($request,[
            'image' => 'required|image|mimes:jpg,jpeg,png,bmp|max:1024',
        ]);
        $item->link = $request->link;
        if ($request->hasFile('image')){
            $item->image = $request->image->hashName();
            Image::make($request->file('image')->getRealPath())->resize(120, 20)->save("assets/frontend/upload/images/sponsors/".$item->image);
        }
        $item->save();
        session()->flash('message','Sponsor information inserted Successfully');
        return redirect()->back();
    }

    public function delete(Request $request){
        $item = Sponsor::find($request->imgid);
        @unlink('assets/frontend/upload/images/sponsors/'.$item->image);
        $item->delete();
        session()->flash('message','Sponsor Information Deleted Successfully');
        return redirect()->back();
    }
}
