<?php

namespace App\Http\Controllers;

use App\emailtemplate;
use App\Subscriberr;
use Illuminate\Http\Request;

class subcribeController extends Controller
{
    public function subscription(){
        $items = Subscriberr::paginate(30);
        return view('backend.subscribe.index', compact('items'));
    }

    public function userSubscription(){
        return view('backend.subscribe.email');
    }

    public function subscriptionMail(Request $request){
        $items = Subscriberr::all();
        foreach ($items as $item) {
            $name = $item->name;
            $to = $item->email;
            $subject = $request->subject;
            $msg = $request->msg;
            send_email($to, $name, $subject, $msg);
        }
        session()->flash('message','Email Sent Successfully');
        return redirect()->back();
    }

    public function unSubscribe(Request $request){
        $item = Subscriberr::find($request->id);
        $item->delete();
        session()->flash('message','User Unsubscribed Successfully');
        return redirect()->back();
    }

}
