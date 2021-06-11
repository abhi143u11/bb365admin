<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Images;
use App\Models\CustomImgs;
use App\Models\Categories;
use App\Models\SubCategories;
Use DB;
use Auth;

class CustomImgController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custom_imgs = CustomImgs::with('subcategories')->get();
        $subcategories = SubCategories::all();
 
        return view('admin.images.customimg',compact('custom_imgs','subcategories'));
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
         'image' => 'required|mimes:jpeg,jpg,png,svg,gif|max:2048',
         'sub_cat_id' => 'required',
             ]);

             if ($validator->fails()) {
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
         }

             if ($request->hasFile('file')) {
             $image = $request->file('file');
            $extention = $image->getClientOriginalExtension();

            if($extention == 'psd'){

         $custom_imgs = new CustomImgs();

         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $name = time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/images/images');
             $image->move($destinationPath, $name);
             $custom_imgs->image = $name;
                   }

         if ($request->hasFile('file')) {
             $image = $request->file('file');
             $name = time().'.'.$image->getClientOriginalExtension();
             $destinationPath = public_path('/psd');
             $image->move($destinationPath, $name);
             $custom_imgs->psd = $name;
                   }

         $custom_imgs->category = $request->sub_cat_id;
         $custom_imgs->save();
 
        Session::flash('statuscode','success');
        return redirect('/customimg')
                ->with('status','Data Added Successfully ');

            }else{

                 $validator = Validator::make($request->all(),[
                    'file' => 'required|mimes:psd|max:4000',
                  ]);

                    if ($validator->fails()) {
                    Session::flash('statuscode','error');
                    return back()->with('status', $validator->messages()->first());
                }
            }
             
             }
         $validator = Validator::make($request->all(), [
         'file' => 'required',
             ]);

             if ($validator->fails()) {
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
         }

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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    { 

      $custom_imgs = CustomImgs::findOrFail($id);

     // dd($custom_imgs);

      $filename = $custom_imgs->image;

      $path = public_path() . "/customimg2/" . $filename;

          if(File::exists($path)) {
            File::delete($path);
          }
 
      $filename2 = $custom_imgs->psd;

   $path2 = public_path() . "/customimg2/" . $filename2;

//    print_r($path2);
//    exit;

        if(File::exists($path2)) {
            File::delete($path2);
          }

      $custom_imgs->delete();

      Session::flash('statuscode','success');
      return redirect('/customimg')->with('status','Record Deleted Successfully');
   
    }
}
