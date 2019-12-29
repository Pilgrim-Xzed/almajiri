<?php

namespace App\Http\Controllers;

use App\OurHistory;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function index()
    {
        $histories = OurHistory::orderBy('id','DESC')->paginate(12);
        return view('backend.our-history.index', compact('histories'));
    }

    public function create()
    {
        return view('backend.our-history.addhistory');
    }

    public function store(Request $request)
    {
        $history = new OurHistory();
        $this->validate($request,[
            'history_title' => 'required',
            'history_text' => 'required|string|max:350',
        ]);
        $history->title = $request->history_title;
        $history->text = $request->history_text;
        $history->save();
        session()->flash('message','History Created Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $history =  OurHistory::find($id);
        return view('backend.our-history.edithistory', compact('history'));
    }

    public function update(Request $request, $id)
    {
        $history = OurHistory::find($id);
        $this->validate($request,[
            'history_title' => 'required',
            'history_text' => 'required|string|max:350',
        ]);
        $history->title = $request->history_title;
        $history->text = $request->history_text;
        $history->save();
        session()->flash('message','History Updated Successfully');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $history =  OurHistory::where('id', $request->postid)->first();
        $history->delete();
        session()->flash('message','History Deleted Successfully');
        return redirect()->back();
    }
}
