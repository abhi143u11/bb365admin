<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
// use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use App\Models\Images;
use App\Models\Categories;
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
      
        $images = Images::with('categories')->get();
        $categories = Categories::all();
      return view('admin.images.images',compact('images','categories'));
    }

    public function bulkedit()
    {
      
        $images = Images::with('categories')->get();
        $categories = Categories::all();
      return view('admin.images.edit-bulkproduct',compact('images','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      // print_r($request->all());
      // exit;
 
        for($i = 0; $i < count($request->mrp); $i++) {

          DB::table('images')
          ->where('product_id', $request->ids[$i])
          ->update([
            'mrp' => $request->mrp[$i],
            'quantity' => $request->qty[$i],
            'original_price' => $request->orginal[$i],
            ]);
          }

       Session::flash('statuscode','success');
       return redirect('/images')
            ->with('status','Data Added Successfully ');
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function insert(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
         'image' => 'required|max:10000|mimes:jpg,jpeg,svg,png',
         'featured' => 'required',
         'category_id' => 'required',
         'type'=>'required'
           
             ]);
             if ($validator->fails()) {
                Session::flash('statuscode','error');
                return back()->with('status', $validator->messages()->first());
            }

            $images = new Images();
           
            
            if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/images/');
            $image->move($destinationPath, $name);
            $images->image = $name;
                  }
  
        
            $images->featured = $request->input('featured');
             $images->type = $request->input('type');
            $images->cat_id = $request->input('category_id');
          
            $images->save();

        $images = Images::all();
        Session::flash('statuscode','success');
        return redirect('/images')
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
              $destinationPath = public_path('/images/images/');
              $image->move($destinationPath, $name);
              $images->image = $name;
                    }
                    
         
            $images->featured = $request->input('featured');
            $images->cat_id = $request->input('category_id');
         
         
            $images->update();

        $images = Images::all(); 
        Session::flash('statuscode','info');
        return redirect('/images')
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
        // if(File::exists($imagepath)) {
        //     File::delete($imagepath);
        //   }
      $images->delete();

      Session::flash('statuscode','success');
      return redirect('/images')->with('status','Record Deleted Successfully');
   
    }
}
