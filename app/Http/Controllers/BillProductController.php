<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillProduct;
use App\Models\Users;
use App\Models\Images;
use App\Models\Bills;
use App\Models\ProductsCategories;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
Use DB;
use Auth;

class BillProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billproducts = BillProduct::with('categories','subcategories')->get();
        $categories = ProductsCategories::all();
        $products = Products::all();
        $bills = Bills::all();
        return view('admin.billproducts',compact('billproducts','categories','products','bills'));
    }


//Fetch Sub Categories
    public function getSubCategory($id)
    {
            $subcategory = DB::table("products_sub_categories")
                             ->where("cat_id",$id)
                             ->pluck("sub_cat_name","id");
            return json_encode($subcategory);
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
    
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'product_name' => 'required',
                ]);
                if ($validator->fails()) {
                Session::flash('statuscode','error');
                return back()->with('status', $validator->messages()->first());
            }
            $bill_id = $request->input('bill_id');
            $billproducts = new BillProduct();
            $billproducts->bill_id = $bill_id;
            $product_name_id = $request->input('product_name');
           
            $id_name = explode("|",$product_name_id);
            for($i = 0; $i < count($id_name); $i++) {
               $billproducts->product_id = $id_name[0]; 
               $billproducts->product_name = $id_name[1]; 
           }
            
            $mrp = $request->input('mrp');
            $quantity = $request->input('quantity');
            $sub_totals = $mmd_price * $quantity;
            $billproducts->sub_total = $sub_totals;
            $billproducts->size = $request->input('size');
            $billproducts->quantity = $quantity;
            $billproducts->mrp = $mrp;
            $billproducts->product_cat_id = $request->input('category_id');
            $billproducts->save();

            $total_sub_totals =  BillProduct::where('bill_id',$bill_id)->sum('sub_total');

           $bill_details = Bills::where('id', $bill_id)->select('discount','sub_total')->first();
         
            if($bill_details != ""){
                $discount = $bill_details->discount;
                $old_sub_total = $bill_details->sub_total;
                $cuted_total = $total_sub_totals * $discount/100;
                $cuted_sub_total = $total_sub_totals- $cuted_total;
                $main_sub_total = $old_sub_total + $cuted_sub_total;

                Bills::where('id', $bill_id)->update([
                    'total_amount' => $total_sub_totals,
                    'sub_total' => $cuted_sub_total,
                    ]);
            }else{
                Bills::where('id', $bill_id)->update([
                    'total_amount' => $total_sub_totals,
                    'sub_total' => $total_sub_totals,
                    ]);
            }

            Session::flash('statuscode','success');
            return redirect('/bill-edit/'.$bill_id)
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
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billproducts = BillProduct::findorFail($id);
        $products = Products::all();
        $categories = ProductsCategories::all();
        $bills = Bills::all();
        return view('admin.edit-billproduct',compact('billproducts','categories','products','bills'));
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
            'product_name' => 'required',
         // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          if ($validator->fails()) {
            // return response()->json(['error' => true,'validation'=>$validator->messages()->first()], 200, []);
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
          }

         $vendorid = Auth::user()->id;
        $billproducts = BillProduct::findorFail($id);
        $product_name_id = $request->input('product_name');

        $id_name = explode("|",$product_name_id);
            for($i = 0; $i < count($id_name); $i++) {
               $billproducts->product_id = $id_name[0]; 
               $billproducts->product_name = $id_name[1]; 
           }
           
        $mrp = $request->input('mrp');
        $quantity = $request->input('quantity');
        $sub_totals = $mmd_price * $quantity;
        $billproducts->sub_total = $sub_totals;
        $billproducts->size = $request->input('size');
        $billproducts->quantity = $quantity;
        $billproducts->mrp = $mrp;
        $billproducts->product_cat_id = $request->input('category_id');
        $billproducts->update();

        $bill_id = $billproducts->bill_id;

        $total_sub_totals =  BillProduct::where('bill_id',$bill_id)->sum('sub_total');

        $bill_details = Bills::where('id', $bill_id)->select('discount')->first();

        if($bill_details != ""){
            $discount = $bill_details->discount;
            $old_sub_total = $bill_details->sub_total;
            $cuted_total = $total_sub_totals * $discount/100;
            $cuted_sub_total = $total_sub_totals- $cuted_total;
            $main_sub_total = $old_sub_total + $cuted_sub_total;

            Bills::where('id', $bill_id)->update([
                'total_amount' => $total_sub_totals,
                'sub_total' => $cuted_sub_total,
                ]);
        }else{
            Bills::where('id', $bill_id)->update([
                'total_amount' => $total_sub_totals,
                'sub_total' => $total_sub_totals,
                ]);
        }
       
        Session::flash('statuscode','info');
        return redirect('/bill-edit/'.$bill_id)
               ->with('status', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $billproducts = BillProduct::findorFail($id);
        $bill_id = $billproducts->bill_id;
        $filename = $billproducts->image;
        $imagepath = 'images/'.$filename;
          if(File::exists($imagepath)) {
              File::delete($imagepath);
            }
        $billproducts->delete();
 
        Session::flash('statuscode','error');
        return redirect('/bill-edit/'.$bill_id)
              ->with('status', 'Data Deleted successfully');
    }
}
