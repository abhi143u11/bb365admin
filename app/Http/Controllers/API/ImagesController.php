<?php


namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Images;
use App\Models\Categories;
use App\Models\CustomImgs;
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
         $customimgs = CustomImgs::with('subcategories')->get();

        if($customimgs ->count() > 0){
            return response()->json($customimgs,200);
        }else{
            return response()->json(['error' => true, 'Message' => "No Custom Imgs found"], 200);
        }

    }


    public function insert(Request $request)
    {
    //  dd($request->all());
        // $validator = Validator::make($request->all(), [
        //  'image' => 'required|max:2048|mimes:jpg,jpeg,png',
      
        //  'sub_cat_id' => 'required',
        //  'image_type'=>'required'
           
        //      ]);
        //      if ($validator->fails()) {
        //         Session::flash('statuscode','error');
        //         return back()->with('status', $validator->messages()->first());
        //     }

        //     $images = new Images();
           
            
        //     if ($request->hasFile('image')) {
        //            $image = $request->file('image');
        //       $name = time().'.'.$image->getClientOriginalExtension();
        //      $ImageUpload = Image::make($image);

        //       $ImageUpload->resize(300,300);
              
        //       $thumbnailPath = public_path('images/thumbnails/');
        //       $ImageUpload = $ImageUpload->save($thumbnailPath.$name);
            

        //     $image = $request->file('image');
        //    // $name = time().'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/images/images/');
        //     $image->move($destinationPath, $name);
        //     $images->image = $name;
        //           }


        //     if ($request->hasFile('video')) {
        //          $video = $request->file('video');
        //       $name = time().'.'.$video->getClientOriginalExtension();

        //       $destinationPath = public_path('images/videos/');
        //        $video->move($destinationPath, $name);
            
        //        $images->video = $name;
        //           }
  
        
        //      $images->image_type = $request->input('image_type');
        //      $images->post_type = $request->input('post_type');
  
      
        //     $images->sub_cat_id = $request->input('sub_cat_id');
          
        //     $images->save();

        // $images = Images::all();
        // Session::flash('statuscode','success');
        // return redirect('/imagesnew')
        //      ->with('status','Data Added Successfully ');
         
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
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($product_id)
    { 

  
   
    }
 
}