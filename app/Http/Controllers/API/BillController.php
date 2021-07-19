<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\Transaction;
use App\Models\BillProduct;
use App\Models\Images;
use App\Models\NotificationMessage;
use DB;
use Auth;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Carbon\Carbon;


class BillController extends Controller
{

      public function addbill(Request $request)
    {

     
      
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
           
             'userid' => 'required',
            'paymentid' => 'required',
            'transaction_type' => 'required',
            'transaction_signature' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'subscription_id' => 'required',
            'days'=>'required',
            'downloads'=>'required',
            'subscription_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }
        $transaction = new Transaction();
        $transaction->name = $request->input('name');
        $transaction->mobile_number = $request->input('number');
        $transaction->user_type = "customer";
        $transaction->user_id = $request->input('userid');
       // $transaction->order_id = $request->input('orderid');
        $transaction->payment_id = $request->input('paymentid');
        $transaction->transaction_type = $request->input('transaction_type');
        $transaction->transaction_signature = $request->input('transaction_signature');
        $transaction->status = $request->input('status');
        $transaction->amount = $request->input('amount');
        $transaction->payment_method = $request->input('payment_method');
        $transaction->remarks = $request->input('subscription_name');
        $transaction->save();

          $from_date = Carbon::now();
        $to_date = Carbon::now()->addDays($request->input('days'));
        $downloads = $request->input('downloads');

         $user  = Users::findorFail($request->input('userid'));

        $user->package_type = $request->input('subscription_id');
        $user->package_start = $from_date;
        $user->package_end =  $to_date;
        $user->downloads = $downloads;
          
          

      if($user->update()){
  return response()->json(['error' => false,'data' =>$user]);
               }else{
  return response()->json(['error' => true,'data' =>"Something went Wrong"]);
               }
  }

    public function freetrial(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
             'userid' => 'required',
          
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }
     
         $user  = Users::findorFail($request->input('userid'));

         if($user->trial == 0){

         
      
        $transaction = new Transaction();
        $transaction->name = $request->input('name');
        $transaction->mobile_number = $request->input('number');
        $transaction->user_type = "customer";
        $transaction->user_id = $request->input('userid');
       // $transaction->order_id = $request->input('orderid');
        $transaction->payment_id = 'direct';
        $transaction->transaction_type = 'Free Trial';
        $transaction->transaction_signature = 'Free Trial';
        $transaction->status ='Free Trial';
        $transaction->amount = 0;
        $transaction->payment_method = 'direct';
        $transaction->remarks = 'Free Trial';
        $transaction->save();

          $from_date = Carbon::now();
        $to_date = Carbon::now()->addDays(7);
    


        $user->package_type = 2;
        $user->package_start = $from_date;
        $user->package_end =  $to_date;
        $user->downloads = 10;
          
          

      if($user->update()){
  return response()->json(['error' => false,'data' =>$user]);
               }else{
  return response()->json(['error' => true,'data' =>"Something went Wrong"]);
               }
  }
else{
  return response()->json(['error' => true,'data' =>"You Have Already Used Free Trial"]);
}
    }
} 