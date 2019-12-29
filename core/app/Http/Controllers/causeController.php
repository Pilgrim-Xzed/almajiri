<?php

namespace App\Http\Controllers;

use App\Cause;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class causeController extends Controller
{
    public function index()
    {
        $items = Cause::orderBy('created_at', 'DESC')->paginate(12);
        return view('backend.cause.index', compact('items'));
    }


    public function create()
    {
        return view('backend.cause.add');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'goal' => 'required',
            'description' => 'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,bmp,|max:5012',
        ]);
        $excep = Input::except('_token', 'image');
        if ($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(('assets/frontend/upload/images/cause'), $image);
        }
        Cause::create($excep + ['image' => $image]);
        session()->flash('message','Cause Created Successfully');
        return redirect()->back();
    }


    public function show($id)
    {
       //
    }


    public function edit($id)
    {
        $item = Cause::find($id);
        return view('backend.cause.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Cause::find($id);
        $excep = Input::except('_token', '_method', 'image');
        if ($request->hasFile('image')){
            @unlink('assets/frontend/upload/images/cause/'.$item->image);
            $image = $request->image->hashName();
            $request->image->move(('assets/frontend/upload/images/cause/'), $image);
            Cause::find($id)->update($excep + ['image' => $image]);
        }else{
            Cause::find($id)->update($excep);
        }
        session()->flash('message','Cause Updated Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }


    public function delete(Request $request)
    {
        $item = Cause::find($request->causeid);
        @unlink('assets/frontend/upload/images/cause/' . $item->image);
        $item->delete();
        session()->flash('message', 'Cause Deleted Successfully');
        return redirect()->back();
    }
}