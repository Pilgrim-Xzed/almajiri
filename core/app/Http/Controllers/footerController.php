<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\footer;
class footerController extends Controller
{
    public function index(){
        $item = footer::first();
        return view('backend.footer.index', compact('item'));
    }

    public function store(Request $request){
        $item = footer::first();
        if(!count($item)){
            $item = new footer();
            $this->validate($request,[
                'footer_head'=>'required',
                'footer_text'=>'required',
            ]);
            $item->heading = $request->footer_head;
            $item->text = $request->footer_text;
            $item->save();
            session()->flash('message','Information Updated Successfully');
            return redirect()->back();
        }else {
            $this->validate($request, [
                'footer_head' => 'required',
                'footer_text' => 'required',
            ]);
            $item->heading = $request->footer_head;
            $item->text = $request->footer_text;
            $item->save();
            session()->flash('message', 'Information Updated Successfully');
            return redirect()->back();
        }
    }
}
