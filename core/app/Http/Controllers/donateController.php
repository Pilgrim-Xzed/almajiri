<?php

namespace App\Http\Controllers;

use App\Donate;
use Illuminate\Http\Request;

class donateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = Donate::orderBy('amount', 'ASC')->paginate(12);
       return view('backend.donate-now.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.donate-now.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Donate();
        $this->validate($request,[
            'amount' => 'required',
            'description' => 'required|string|max:500',
        ]);
        $item->amount = $request->amount;
        $item->description = $request->description;
        $item->save();
        session()->flash('message','Information Added Successfully');
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
        $item = Donate::find($id);
        return view('backend.donate-now.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Donate::find($id);
        $this->validate($request,[
            'amount' => 'required',
            'description' => 'required|string|max:500',
        ]);
        $item->amount = $request->amount;
        $item->description = $request->description;
        $item->save();
        session()->flash('message','Information Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request){
        $item = Donate::find($request->id);
        $item->delete();
        session()->flash('message','Information Deleted Successfully');
        return redirect()->back();
    }
}
