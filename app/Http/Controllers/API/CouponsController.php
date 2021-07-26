<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Coupons;
use App\Models\Bills;
use App\Models\Users;
use DB;

class CouponsController extends Controller
{
  
      public function index()
    {
        $coupons = Coupons::where('coupon_status',1)->get();
        if($coupons->count() > 0){
        return response()->json($coupons,200);
        }else{
            return response()->json(['error' =>true, 'message' => "No Coupons Found"], 200);
        }

    }



 public function coupon(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'coupon_code' => 'required',
            'customer_id' => 'required',
          
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }

    //    DB::enableQueryLog(); // Enable query log

// Your Eloquent query executed by using get()


        $coupon_code = $request->input('coupon_code');
        $customer_id = $request->input('customer_id');
       // $user = Users::where('id',$customer_id)->first();

    $bills = Bills::where('customer_id',$customer_id)->where('coupon_code',$coupon_code)->get();

    if($bills->count() > 0){
            
// print_r("bills");
// exit;
        return response()->json(['error' => true, 'message' => "No Coupon Found"]);

    }else{

// print_r("coupons");
// exit;

    $coupons = Coupons::where('coupon_status',1)->where('coupon_code','=',$coupon_code)->get();


// dd(DB::getQueryLog());
   // print_r($coupons);
    if($coupons->count() > 0){
   
     //    $coupons = Coupons::where('coupon_status',1)->where('coupon_code',$coupon_code)->where('coupon_status','=','1')->where('customer_id',$customer_id)->orWhere('customer_id','0')->get();
    $coupons =   Coupons::where(DB::raw('BINARY `coupon_code`'),$coupon_code)
->where('coupon_status',1)
// ->where('customer_id',$customer_id)
// ->orWhere('customer_id','0')
->get();
        
         return response()->json($coupons,200);
        
    }else{    
        return response()->json(['error' => true, 'message' => "No Coupon Found"]);
        }

    }

    }

 

}   
