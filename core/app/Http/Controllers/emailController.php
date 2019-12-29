<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\emailtemplate;
class emailController extends Controller
{
    public function index(){
        $item = emailtemplate::first();
        return view('backend.email-template.index', compact('item'));
    }

    public function store(Request $request)
    {
        $item = emailtemplate::first();
        if (!count($item)) {
            $item = new emailtemplate();
            $this->validate($request, [
                'form_mail' => 'required|string|email|max:255',
                'email_text' => 'required',
            ]);
            $item->sender = $request->form_mail;
            $item->email = $request->email_text;
            $item->save();
            session()->flash('message', 'Email Template Created Successfully');
        }else{
            $this->validate($request, [
                'form_mail' => 'required|string|email|max:255',
                'email_text' => 'required',
            ]);
            $item->sender = $request->form_mail;
            $item->email = $request->email_text;
            $item->save();
            session()->flash('message', 'Email Template Updated Successfully');

        }
        return redirect()->back();
    }
}
