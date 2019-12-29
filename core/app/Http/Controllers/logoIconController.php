<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logoicon;
class logoIconController extends Controller
{
    public function index(){
        $items = logoicon::all();
        return view('backend.logo-icon.index', compact('items'));
    }

    public function update(Request $request){

        $item = logoicon::first();
            $this->validate($request,[
                'logo_image'=>'image|mimes:jpeg,png,jpg,|max:1024',
                'fav_image'=>'image|mimes:png,ico,|max:1024',
                'crumb_image'=>'image|mimes:jpeg,png,jpg,bmp,|max:2048',
            ]);
            if ($request->hasFile('logo_image')){
                @unlink ('assets/frontend/upload/images/logo/'.$item->logo);
                $item->logo = $request->logo_image->hashName();
                $request->logo_image->move(('assets/frontend/upload/images/logo'), $item->logo);
            } elseif ($request->hasFile('fav_image')){
                @unlink ('assets/frontend/upload/images/logo/'.$item->fav);
                $item->fav = $request->fav_image->hashName();
                $request->fav_image->move(('assets/frontend/upload/images/logo'), $item->fav);
            } elseif ($request->hasFile('crumb_image')){
                @unlink ('assets/frontend/upload/images/logo/'.$item->breadcrumb);
                $item->breadcrumb = $request->crumb_image->hashName();
                $request->crumb_image->move(('assets/frontend/upload/images/logo'), $item->breadcrumb);
            } elseif ($request->hasFile('logo_image') && $request->hasFile('fav_image')){
                @unlink ('assets/frontend/upload/images/logo/'.$item->logo);
                $item->logo = $request->logo_image->hashName();
                $request->logo_image->move(('assets/frontend/upload/images/logo'), $item->logo);
                @unlink ('assets/frontend/upload/images/logo/'.$item->fav);
                $item->fav = $request->fav_image->hashName();
                $request->fav_image->move(('assets/frontend/upload/images/logo'), $item->fav);
            }
            elseif ($request->hasFile('logo_image') && $request->hasFile('crumb_image')){
                @unlink ('assets/frontend/upload/images/logo/'.$item->logo);
                $item->logo = $request->logo_image->hashName();
                $request->logo_image->move(('assets/frontend/upload/images/logo'), $item->logo);
                @unlink ('assets/frontend/upload/images/logo/'.$item->breadcrumb);
                $item->breadcrumb = $request->crumb_image->hashName();
                $request->crumb_image->move(('assets/frontend/upload/images/logo'), $item->breadcrumb);
            }
            elseif ($request->hasFile('fav_image') && $request->hasFile('crumb_image')){
                @unlink ('assets/frontend/upload/images/logo/'.$item->fav);
                $item->fav = $request->fav_image->hashName();
                $request->fav_image->move(('assets/frontend/upload/images/logo'), $item->fav);
                @unlink ('assets/frontend/upload/images/logo/'.$item->breadcrumb);
                $item->breadcrumb = $request->crumb_image->hashName();
                $request->crumb_image->move(('assets/frontend/upload/images/logo'), $item->breadcrumb);
            }
            else if ($request->hasFile('logo_image') && $request->hasFile('fav_image') && $request->hasFile('crumb_image')){
                @unlink ('assets/frontend/upload/images/logo/'.$item->logo);
                $item->logo = $request->logo_image->hashName();
                $request->logo_image->move(('assets/frontend/upload/images/logo'), $item->logo);
                @unlink ('assets/frontend/upload/images/logo/'.$item->fav);
                $item->fav = $request->fav_image->hashName();
                $request->fav_image->move(('assets/frontend/upload/images/logo'), $item->fav);
                @unlink ('assets/frontend/upload/images/logo/'.$item->breadcrumb);
                $item->breadcrumb = $request->crumb_image->hashName();
                $request->crumb_image->move(('assets/frontend/upload/images/logo'), $item->breadcrumb);
            }
            $item->save();
            session()->flash('message','Updated Successfully');
            return redirect()->back();
  }

}
