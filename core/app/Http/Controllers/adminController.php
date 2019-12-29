<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Subscriberr;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\generalsetting;
use App\deposit;
class adminController extends Controller
{
    public function index()
    {
        $user = Subscriberr::count('id');
        $pendingORders = deposit::where('status', 0)->where('gateway_id', '>', 8)->count('id');
        $acceptedorders = deposit::where('status', 1)->count('id');
        $orders = deposit::count('id');
        $pendingvol = Volunteer::where('status', 0)->count('id');
        $vol = Volunteer::where('status', 1)->count('id');
        return view('backend.dashboard.index', compact('user', 'pendingORders', 'acceptedorders', 'orders', 'pendingvol', 'vol'));
    }

    public function profile(){
        $item = Admin::find(Auth::guard('admin')->user()->id);
     return view('backend.dashboard.profile', compact('item'));
    }

    public function updateprofile(Request $request){
        $item = Admin::find(Auth::guard('admin')->user()->id);
        $this->validate($request,[
            'admin_name'=>'required',
            'admin_email'=>'required|string|email|max:255',
        ]);
        $item->name = $request->admin_name;
        $item->email = $request->admin_email;
        $item->save();
        session()->flash('message','Information Updated Successfully');
        return redirect()->back();
    }

    public function changePass(){
        return view('backend.dashboard.changePass');
    }

    public function updatepass(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $this->validate($request,[
            'new_pw' =>'required|string|min:5',
        ],
            [
                'new_pw.required' => 'New Password is Required',
                'new_pw.min' => 'New Password Should be minium 5 Character',
            ]);
        if(Hash::check($request->cur_pw, $user['password']) && $request->new_pw == $request->con_pw)
        {
            $user->password = bcrypt($request->new_pw);
            $user->save();
            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        }
        else {
            {
                session()->flash('alert','Password Not Changed');
                return redirect()->back();
            }
        }
    }

}
