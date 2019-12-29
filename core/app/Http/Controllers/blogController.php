<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Blog;
use App\FacebookApp;
class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::orderBy('id','DESC')->paginate(9);
        $fb = FacebookApp::first();
       return view('backend.blog.index', compact('posts', 'fb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.addblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $blog = new Blog();
     $this->validate($request,[
         'blog_title' => 'required',
         'blog_text' => 'required',
         'blog_image' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
     ]);
     $blog->title = $request->blog_title;
     $blog->body = $request->blog_text;
        if ($request->hasFile('blog_image')){
            $blog->image = $request->blog_image->hashName();
            $request->blog_image->move(('assets/frontend/upload/images/blog'), $blog->image);
        }
     $blog->save();
        session()->flash('message','Post Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog =  Blog::find($id);
        return view('backend.blog.editblog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog =  Blog::find($id);
        $this->validate($request,[
            'blog_title' => 'required',
            'blog_text' => 'required',
            'blog_image' => 'image|mimes:jpeg,png,jpg,|max:2048',
        ]);
        $blog->title = $request->blog_title;
        $blog->body = $request->blog_text;
        if ($request->hasFile('blog_image')){
            @unlink ('assets/frontend/upload/images/blog/'.$blog->image);
            $blog->image = $request->blog_image->hashName();
            $request->blog_image->move(('assets/frontend/upload/images/blog'), $blog->image);
        }
        $blog->save();
        session()->flash('message','Post updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $blog =  Blog::where('id', $request->postid)->first();
        $blog->delete();
        session()->flash('message','Post Deleted Successfully');
        return redirect()->back();
    }

    public function appId(Request $request){
        $fbid = FacebookApp::first();
        if(!count($fbid)){
            $fbid = new FacebookApp();
            $this->validate($request,[
             'app_id' => 'required'
            ]);
            $fbid->app_id = $request->app_id;
            $fbid->save();
        }else{
            $this->validate($request,[
                'app_id' => 'required'
            ]);
            $fbid->app_id = $request->app_id;
            $fbid->save();
        }
        session()->flash('message','App ID Updated Successfully');
        return redirect()->back();
    }
}
