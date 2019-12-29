<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testimonial;
class testimonialController extends Controller
{
    public function index()
    {
        $testims = testimonial::all();
        return view('backend.testimonial.index', compact('testims'));
    }

    public function store(Request $request)
    {
        $testim = new testimonial;
        $this->validate($request,
            [
                'photo' => 'image|mimes:jpeg,png,jpg,bmp|max:2048',
                'name' => 'required',
                'company' => 'required',
                'comment' => 'required',
            ]);

        if ($request->hasFile('photo')){
            $testim->image = $request->photo->hashName();
            $request->photo->move('assets/frontend/upload/images/testimonial',$testim->image);
        }

        $testim['name'] = $request->name;
        $testim['company'] = $request->company;
        $testim['comment'] = $request->comment;

        $testim->save();
        session()->flash('message','Testimonial Created Successfully');
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $testim = testimonial::find($id);

        $this->validate($request,
            [
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'company' => 'required',
                'comment' => 'required',
            ]);

        if($request->hasFile('photo'))
        {if($testim->image) {
            @unlink('assets/frontend/upload/images/testimonial/' . $testim->image);
        }
            $testim->image = $request->photo->hashName();
            $request->photo->move('assets/frontend/upload/images/testimonial',$testim->image);
        }
        $testim['name'] = $request->name;
        $testim['company'] = $request->company;
        $testim['comment'] = $request->comment;

        $testim->save();

        session()->flash('message','Testimonial Updated Successfully');
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $testim = testimonial::find($request->testimonialid);
        @unlink('assets/frontend/upload/images/testimonial/'.$testim->image);
        $testim->delete();
        session()->flash('message','Testimonial Deleted Successfully');
        return redirect()->back();
    }
}
