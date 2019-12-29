<?php

namespace App\Http\Controllers;

use App\HeadingSection;
use Illuminate\Http\Request;

class sectionController extends Controller
{
    public function index(){
        $item = HeadingSection::first();
        return view('backend.section.index', compact('item'));
    }

    public function store(Request $request){
        $item = HeadingSection::first();
        if(!count($item)){
            $item = new HeadingSection();
            $this->validate($request,[
                'cause'=>'required',
                'volunteer'=>'required',
                'be_volunteer'=>'required',
                'who_talk'=>'required',
                'event'=>'required',
                'blog'=>'required',
                'sponsor'=>'required',
            ]);
            $item->cause = $request->cause;
            $item->volunteer = $request->volunteer;
            $item->be_volunteer = $request->be_volunteer;
            $item->who_talk = $request->who_talk;
            $item->event = $request->event;
            $item->blog = $request->blog;
            $item->sponsor = $request->sponsor;
            $item->save();
            session()->flash('message','Information Updated Successfully');
            return redirect()->back();
        }else {
            $this->validate($request, [
                'cause'=>'required',
                'volunteer'=>'required',
                'be_volunteer'=>'required',
                'who_talk'=>'required',
                'event'=>'required',
                'blog'=>'required',
                'sponsor'=>'required',
            ]);
            $item->cause = $request->cause;
            $item->volunteer = $request->volunteer;
            $item->be_volunteer = $request->be_volunteer;
            $item->who_talk = $request->who_talk;
            $item->event = $request->event;
            $item->blog = $request->blog;
            $item->sponsor = $request->sponsor;
            $item->save();
            session()->flash('message', 'Information Updated Successfully');
            return redirect()->back();
        }
    }
}
