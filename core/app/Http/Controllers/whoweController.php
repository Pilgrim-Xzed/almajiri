<?php

namespace App\Http\Controllers;

use App\WhoWe;
use Illuminate\Http\Request;

class whoweController extends Controller
{
   public function index(){
       $whowes = WhoWe::paginate(12);
       return view('backend.who-we.index', compact('whowes'));
   }

   public function create(){
       return view('backend.who-we.add');
   }

    public function store(Request $request)
    {
        $who = new WhoWe();
        $this->validate($request,[
            'social_icon'=> 'required',
            'who_title' => 'required',
            'who_text' => 'required|string|max:300',
        ]);
        $who->icon = $request->social_icon;
        $who->title = $request->who_title;
        $who->description = $request->who_text;
        $who->save();
        session()->flash('message','Who We Section Created Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $who =  WhoWe::find($id);
        return view('backend.who-we.edit', compact('who'));
    }

    public function update(Request $request, $id)
    {
        $who = WhoWe::find($id);
        $this->validate($request,[
            'social_icon'=> 'required',
            'who_title' => 'required',
            'who_text' => 'required|string|max:300',
        ]);
        $who->icon = $request->social_icon;
        $who->title = $request->who_title;
        $who->description = $request->who_text;
        $who->save();
        session()->flash('message','Who We Section Updated Successfully');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $who =  WhoWe::where('id', $request->postid)->first();
        $who->delete();
        session()->flash('message','Who We Section Deleted Successfully');
        return redirect()->back();
    }
}
