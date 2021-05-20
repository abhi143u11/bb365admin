<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Products::all();
        $videos = Video::with('products')->get();
        return view('admin.video.create',compact('products','videos'));
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
            'title' => 'required',
            'link' => 'required',
     
             ]);
             if ($validator->fails()) {
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
         }
 
         $videos = new Video();
         $videos->title = $request->input('title');
         $videos->link = $request->input('link');
         $videos->product_id = $request->input('product');
      
         if ($request->hasFile('photo')) {
             $image = $request->file('photo');
             $name = time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/images');
             $image->move($destinationPath, $name);
             $videos->image = $name;
                   }

         $videos->save();
 
     $videos = Video::all();
     Session::flash('statuscode','success');
     return redirect('/videos')
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
        $videos = Video::findorFail($id);
        $products = Products::all();
        return view('admin.video.edit',compact('videos','products'));
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
            'title' => 'required',
            'link' => 'required',
     
             ]);
             if ($validator->fails()) {
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
         }
 
         $videos = Video::findorFail($id);
         $videos->title = $request->input('title');
         $videos->link = $request->input('link');
         $videos->product_id = $request->input('product');
      
         if ($request->hasFile('photo')) {
             $image = $request->file('photo');
             $name = time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/images');
             $image->move($destinationPath, $name);
             $videos->image = $name;
                   }

         $videos->update();
 
     $videos = Video::all();
     Session::flash('statuscode','success');
     return redirect('/videos')
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
        $videos = Video::findOrFail($id);
        $filename = $videos->image;
        $imagepath = 'images/'.$filename;
          if(File::exists($imagepath)) {
              File::delete($imagepath);
            }
        $videos->delete();
  
        Session::flash('statuscode','success');
        return redirect('/videos')->with('status','Record Deleted Successfully');
    }
}
