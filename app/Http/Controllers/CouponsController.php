<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Categories;
use App\Models\Coupons;
use App\Models\Users;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons= Coupons::with('categories')->get();
       
        $categories= Categories::all();
        $customers = Users::where('usertype','customer')->get();
   
        return view('admin.coupons.create',compact('coupons','categories','customers'));
    }

    public function getSubCategory($id)
    {
            $subcategory = DB::table("sub_categories")
                             ->where("cat_id",$id)
                             ->pluck("sub_cat_name","sub_cat_id");

            return json_encode($subcategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
           'coupon_code' => 'required',
        //    'max_discount' => 'required',
           'status' => 'required',
    
            ]);
            if ($validator->fails()) {
            Session::flash('statuscode','error');
            return back()->with('status', $validator->messages()->first());
        }

        $coupons = new Coupons();
        $coupons->coupon_code = $request->input('coupon_code');
        $coupons->max_discount = $request->input('max_discount');

        $coupons->customer_id = $request->input('customer_id');
        $coupons->coupon_type = $request->input('coupon_type');
        $coupons->coupon_status = $request->input('status');
      //  $coupons->minimum_price = $request->input('minimum_price');
        $coupons->save();

    $coupons = Coupons::all();
    Session::flash('statuscode','success');
    return redirect('/coupons')
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
        $coupons = Coupons::findorFail($id);
        $categories = Categories::all();
       
        $customers = Users::where('usertype','customer')->get();
        return view('admin.coupons.edit',compact('coupons','categories','customers'));
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
           'coupon_code' => 'required',
            // 'max_discount' => 'required',
            'status' => 'required',
          ]);
          if ($validator->fails()) {
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
          }
    
        $coupons = Coupons::findorFail($id);
        $coupons->coupon_code = $request->input('coupon_code');
        $coupons->max_discount = $request->input('max_discount');
        $coupons->customer_id = $request->input('customer_id');
        $coupons->coupon_type = $request->input('coupon_type');
        $coupons->coupon_status = $request->input('status');
       // $coupons->minimum_price = $request->input('minimum_price');
     
        $coupons->update();
        $coupons = Coupons::all(); 
        Session::flash('statuscode','info');
        return redirect('/coupons')
               ->with('status', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $coupons = Coupons::findOrFail($id);
        $filename = $coupons->coupon_images;
        $imagepath = 'images/'.$filename;
          if(File::exists($imagepath)) {
              File::delete($imagepath);
            }
        $coupons->delete();
  
        Session::flash('statuscode','success');
        return redirect('/coupons')->with('status','Record Deleted Successfully');
    }
}
