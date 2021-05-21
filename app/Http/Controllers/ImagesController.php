<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Images;
use App\Models\Categories;
use App\Models\SubCategories;
Use DB;
use Auth;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $images = Images::with('subcategories')->get();
        $subcategories = SubCategories::all();
      return view('admin.images.images',compact('images','subcategories'));
    }

    public function insert(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
         'image' => 'required|max:2048|mimes:jpg,jpeg,png',
      
         'sub_cat_id' => 'required',
         'image_type'=>'required'
           
             ]);
             if ($validator->fails()) {
                Session::flash('statuscode','error');
                return back()->with('status', $validator->messages()->first());
            }

            $images = new Images();
           
            
            if ($request->hasFile('image')) {
                   $image = $request->file('image');
              $name = time().'.'.$image->getClientOriginalExtension();
             $ImageUpload = Image::make($image);

              $ImageUpload->resize(300,300);
              
              $thumbnailPath = 'public/images/thumbnails/';
              $ImageUpload = $ImageUpload->save($thumbnailPath.$name);
            

            $image = $request->file('image');
           // $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/images/');
            $image->move($destinationPath, $name);
            $images->image = $name;
                  }
  
        
           
             $images->image_type = $request->input('image_type');
             $images->post_type = $request->input('post_type');
  
      
            $images->sub_cat_id = $request->input('sub_cat_id');
          
            $images->save();

        $images = Images::all();
        Session::flash('statuscode','success');
        return redirect('/imagesnew')
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

    public function edit($product_id)
    {
    
        $images = Images::findorFail($product_id);
        $categories = Categories::all();
        return view('admin.images.edit-images',compact('categories','images'));
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$product_id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|max:10000|mimes:jpg,jpeg,svg,png'
         
          //  'order_no' => 'required|unique:categories',
         // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          if ($validator->fails()) {
            // return response()->json(['error' => true,'validation'=>$validator->messages()->first()], 200, []);
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
          }
   
            $images = Images::findorFail($product_id);
         
    
            if ($request->hasFile('image')) {
               $image = $request->file('image');
              $name = time().'.'.$image->getClientOriginalExtension();
              $image->resize(300,300);
              $destinationPath = public_path('/images/thumbnails/');
              $image->move($destinationPath, $name);
              $images->image = $name;


              $image = $request->file('image');
             // $name = time().'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/images/images/');
              $image->move($destinationPath, $name);
              $images->image = $name;
                    }
                    
         
            $images->featured = $request->input('featured');
       
         
            $images->update();

        $images = Images::all(); 
        Session::flash('statuscode','info');
        return redirect('/imagesnew')
               ->with('status', 'Data Updated successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($product_id)
    { 

      $images = Images::findOrFail($product_id);
      $filename = $images->image;
      $imagepath = 'images/images/'.$filename;
        if(File::exists($imagepath)) {
            File::delete($imagepath);
          }
      $images->delete();

      Session::flash('statuscode','success');
      return redirect('/imagesnew')->with('status','Record Deleted Successfully');
   
    }
}