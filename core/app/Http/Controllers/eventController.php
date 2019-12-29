<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class eventController extends Controller
{

    public function index()
    {
        $items = Event::orderBy('created_at', 'DESC')->paginate(12);
        return view('backend.event.index', compact('items'));
    }

    public function create()
    {
        return view('backend.event.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);
        $excep = Input::except('_token', 'image');
        if ($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(('assets/frontend/upload/images/event'), $image);
        }
        Event::create($excep + ['image' => $image]);
        session()->flash('message','Event Created Successfully');
        return redirect()->back();
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $item = Event::find($id);
        return view('backend.event.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {   $item = Event::find($id);
        $excep = Input::except('_token', '_method', 'image');
        if ($request->hasFile('image')){
            @unlink('assets/frontend/upload/images/event/'.$item->image);
            $image = $request->image->hashName();
            $request->image->move(('assets/frontend/upload/images/event/'), $image);
            Event::find($id)->update($excep + ['image' => $image]);
        }else{
            Event::find($id)->update($excep);
        }
        session()->flash('message','Event Updated Successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {

    }

    public function delete(Request $request){
        $item = Event::find($request->eventid);
        @unlink('assets/frontend/upload/images/event/'.$item->image);
        $item->delete();
        session()->flash('message','Event Deleted Successfully');
        return redirect()->back();
    }
}
