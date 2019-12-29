<?php

namespace App\Http\Controllers;

use App\generalsetting;
use App\Volunteer;
use Illuminate\Http\Request;

class volunteerController extends Controller
{
    public function volunteerList(){
        $items = Volunteer::where('status', 1)->orderBy('fname', 'ASC')->paginate(30);
        return view('backend.volunteer.index', compact('items'));
    }

    public function volunteerEmail(){
        return view('backend.volunteer.email');
    }

    public function volunteerEmailSend(Request $request){
        $items = Volunteer::all();
        foreach ($items as $item) {
            $name = $item->fname;
            $to = $item->email;
            $subject = $request->subject;
            $msg = $request->msg;
            send_email($to, $name, $subject, $msg);
        }
        session()->flash('message','Email Sent Successfully');
        return redirect()->back();
    }

    public function volunteerPersonalEmail($id){
        $item = Volunteer::find($id);
        return view('backend.volunteer.singleemail', compact('item'));
    }

    public function volunteerPersonalEmailSend(Request $request, $id){
        $item = Volunteer::find($id);
        $name = $item->fname;
        $to = $item->email;
        $subject = $request->subject;
        $msg = $request->msg;
        send_email($to, $name, $subject, $msg);
        session()->flash('message','Email Sent Successfully');
        return redirect()->route('volunteer.list');
    }

    public function voluteerRemove(Request $request){
        $item = Volunteer::find($request->id);
        @unlink('assets/frontend/upload/images/volunteer/' . $item->image);
        $item->delete();
        session()->flash('message','Volunteer Deleted Successfully');
        return redirect()->route('volunteer.list');
    }

    public function volunteerPendingList()
    {
        $volunteers = Volunteer::where('status', 0)->paginate(30);
        return view('backend.volunteer.pending', compact('volunteers'));
    }

    public function volunteerPendingdetails($id){
        $item = Volunteer::find($id);
        return view('backend.volunteer.pendingDetails', compact('item'));
    }

    public function voluteerApprove(Request $request, $id){
        $item = Volunteer::find($id);
        if ($item->status == 0) {
        if ($request->accept == 1) {
            $item->status = 1;
            $item->save();
            $name = $request->fname;
            $email = $request->email;
            $gset = generalsetting::first();
            $subject = "Approve Request for the Volunteer of " . $gset->title;
            $message = "Congratulations! You are now a official Volunteer of " . $gset->title . "Thanks for Your generous Contribution.";
            send_email($email, $name, $subject, $message);
            session()->flash('message', 'Request Approved Successfully');
        } else if ($request->reject == 2) {
            @unlink('assets/frontend/upload/images/volunteer/' . $item->image);
            $item->delete();
            session()->flash('message', 'Request Rejected Successfully');
        }
    }else{
            session()->flash('alert', 'Action already done for this volunteer');
        }
        return redirect()->route('voluteer.pendinglist');
    }
}
