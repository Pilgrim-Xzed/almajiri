<?php

namespace App\Http\Controllers;


use App\CauseDonor;
use Carbon\Carbon;
use App\getway;
use App\deposit;
use App\User;
use App\generalsetting;
use Illuminate\Http\Request;

class depositController extends Controller
{
    public function gatewayIndex(){
        $items = getway::all();
        return view('backend.deposit.index', compact('items'));
    }


    public function depositPendingList()
    {
        $depo = deposit::where('status', 0)->where('gateway_id','>' , 8)->paginate(10);
        return view('backend.deposit.pendingList', compact('depo'));
    }

    public function depositPendingListDetails($id)
    {
        $item = deposit::find($id);
        return view('backend.deposit.pendingDetails', compact('item'));
    }

    public function depositApprove(Request $request)
    {
        $item = deposit::find($request->depid);
        $user = CauseDonor::where('track_id', $item->unique_key)->first();
        if ($item->status == 0) {
            if ($request->accept == 1) {
                $item->status = 1;
                $item->save();

                $user->status = 1;
                $user->save();

                session()->flash('message', 'Deposit Accepted') ;
            } elseif ($request->reject == 2) {
                $item->status = 2;
                $item->save();
                @unlink ('assets/backend/upload/images/bank-prove/'.$item->prove);
                $user->delete();
                session()->flash('message', 'Deposit Rejected');
            }
        } else {
            session()->flash('alert', 'Already Done');
        }
        return redirect()->route('pendingDeposite.list');
    }

    public function depositList()
    {
        $items = deposit::paginate(10);
        return view('backend.deposit.depositList', compact('items'));
    }

    public function gatewayStore(Request $request){
        $item = new getway;
        $item->name = $request->name;
        $item->fix_charge = $request->fix_charge;
        $item->percent_charge = $request->per_charge;
        $item->rate = $request->rate;
        $item->val1 = $request->val1;
        $item->currency = $request->currency;
        if($request->status) {
            $item->status = 1;
        }else{
            $item->status = 0;
        }
        if ($request->hasFile('gate_logo')){
            $item->gateimg = $request->gate_logo->hashName();
            $request->gate_logo->move(('assets/backend/upload/images/payment'), $item->gateimg);
        }
        $item->save();
        session()->flash('message','Payment Gateway Created Successfully');
        return redirect()->back();
    }

    public function gatewayUpdate(Request $request){
        $item = getway::find($request->egtid);
        $item->name = $request->name;
        $item->fix_charge = $request->fix_charge;
        $item->percent_charge = $request->per_charge;
        $item->rate = $request->rate;
        $item->val1 = $request->val1;
        $item->val2 = $request->val2;
        $item->currency = $request->currency;
        if($request->status) {
            $item->status = 1;
        }else{
            $item->status = 0;
        }
        if ($request->hasFile('gate_logo')){
            @unlink('assets/backend/upload/images/payment/'.$item->gateimg);
            $item->gateimg = $request->gate_logo->hashName();
            $request->gate_logo->move(('assets/backend/upload/images/payment'), $item->gateimg);

        }
        $item->save();
        session()->flash('message','Payment Gateway Updated Successfully');
        return redirect()->back();
    }
}
