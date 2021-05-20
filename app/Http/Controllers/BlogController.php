<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.create',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required',
            'name' => 'required',
     
             ]);
             if ($validator->fails()) {
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
         }
 
         $blogs = new Blog();
         $blogs->name = $request->input('name');
         $blogs->description = $request->input('description');
         $blogs->tags = $request->input('tags');
      
         if ($request->hasFile('photo')) {
             $image = $request->file('photo');
             $name = time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/images');
             $image->move($destinationPath, $name);
             $blogs->photo = $name;
                   }
         $blogs->save();
 
     $blogs = Blog::all();
     Session::flash('statuscode','success');
     return redirect('/blogs')
             ->with('status','Data Added Successfully ');
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
        $blogs = Blog::findorFail($id);
        return view('admin.blog.edit',compact('blogs'));
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
        $validator = Validator::make($request->all(), [
            //'photo' => 'required',
            'name' => 'required',
     
             ]);
             if ($validator->fails()) {
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
         }
 
         $blogs = Blog::findorFail($id);
         $blogs->name = $request->input('name');
         $blogs->description = $request->input('description');
         $blogs->tags = $request->input('tags');
      
         if ($request->hasFile('photo')) {
             $image = $request->file('photo');
             $name = time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/images');
             $image->move($destinationPath, $name);
             $blogs->photo = $name;
                   }
         $blogs->update();
 
     $blogs = Blog::all();
     Session::flash('statuscode','success');
     return redirect('/blogs')
             ->with('status','Data Updated Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);
        $filename = $blogs->photo;
        $imagepath = 'images/'.$filename;
          if(File::exists($imagepath)) {
              File::delete($imagepath);
            }
        $blogs->delete();
  
        Session::flash('statuscode','success');
        return redirect('/blogs')->with('status','Record Deleted Successfully');
    }
}
