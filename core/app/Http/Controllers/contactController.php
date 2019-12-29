<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
class contactController extends Controller
{
    public function index(){
        $item = contact::first();
        return view('backend.contact.index', compact('item'));
    }

    public function store(Request $request){
        $item = contact::first();
        if(!count($item)) {
            $item = new contact();
            $this->validate($request, [
                'contact_email' => 'string|email|max:255'
            ]);
            $item->email = $request->contact_email;
            $item->mobile = $request->contact_mobile;
            $item->location = $request->contact_location;
            $item->script = $request->contact_script;
            $item->save();
            session()->flash('message', 'Information created Successfully');
            return redirect()->back();
        }else{
            $this->validate($request, [
                'contact_email' => 'string|email|max:255'
            ]);
            $item->email = $request->contact_email;
            $item->mobile = $request->contact_mobile;
            $item->location = $request->contact_location;
            $item->script = $request->contact_script;
            $item->save();
            session()->flash('message', 'Information Updated Successfully');
            return redirect()->back();
        }
    }
}
