<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menuManagement;
class menuManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = menuManagement::all();
      return view('backend.menu-manager.index',compact('items'));
    }

    public function create()
    {
        return view('backend.menu-manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new menuManagement;
        $this->validate($request,[
            'page_title'=>'required',
            'page_content'=>'required'
        ]);
        $item->name = $request->page_title;
        $item->details = $request->page_content;
        $item->save();
        session()->flash('message','Page Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = menuManagement::find($id);
        return view('backend.menu-manager.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = menuManagement::find($id);
        $this->validate($request,[
            'page_title'=>'required',
            'page_content'=>'required',
        ]);
        $item->name = $request->page_title;
        $item->details = $request->page_content;
        $item->save();
        session()->flash('message','Information Updated Successfully');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $item = menuManagement::find($request->itemid);
        $item->delete();
        session()->flash('message','Information Deleted Successfully');
        return redirect()->back();
    }
}
