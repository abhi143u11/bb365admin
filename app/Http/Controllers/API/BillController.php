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
use Mail;
use App\Mail\OrderApprovedMail;
use App\Mail\OrderCancelMail;
use App\Models\Coupons;

class BillController extends Controller
{

      public function addbill(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
           'number' => 'required',

             ]);
             if ($validator->fails()) {
                  return response()->json(['error' => true, 'name'=>$request->name,'validation' => $validator->messages()->first()]);
                //return response()->json(['error' => true, 'validation' => $validator->messages()->first()]);
            }

        //   $bills =  Bills::where('id',3)->first();

          $bills = new Bills();
          $bills->customer_id = $request->customer_id;
          $bills->name = $request->name;
          $bills->mobile = $request->number;
          $bills->area = $request->area;
          $bills->state = $request->state;
          
          $bills->house_no = $request->house_no;
          $bills->landmark = $request->landmark;
          $bills->address_type = $request->address_type;

          $bills->city = $request->city;
          $bills->bill_date = Carbon::now();
          $bills->pincode = $request->pincode;
          $bills->coupon_code = $request->coupon_code;

          // if($request->coupon_code != ''){
          //   // Coupons::where('coupon_code',$request->coupon_code)->update([
          //   //   'active'=>0,
          //   // ]);

          //   Coupons::where('coupon_code', $request->coupon_code)
         
          // ->update(['coupon_status' => 0]);
          // }
          $bills->discount = $request->discount;
          $bills->sub_total = $request->sub_total;
          $bills->total_amount = $request->total;
          $bills->status = "Ordered";
        $bills->save();

   if($request->products){

    $products = $request->products;
    
   foreach($products as $product){
  
            $billproducts = new BillProduct();
            $billproducts->bill_id = $bills->id;
            $billproducts->product_id = $product['product_id'];
            $billproducts->product_name = $product['product_name'];
          //  $productimage = Products::where('product_id', $product['product_id'])->value('image');
            $billproducts->image = $product['image'];
            $mrp = $product['mrp'];
         
            $quantity = $product['quantity'];

            $sub_totals = $mrp * $quantity;
            $billproducts->sub_total = $sub_totals;

            $billproducts->size = $product['size'];
            $billproducts->quantity = $quantity;

            $billproducts->mrp = $mrp;
            $billproducts->product_cat_id = $product['category_id'];
            $billproducts->hsn_code = $product['hsn_code'];
            $billproducts->save();

        $stock = Products::where('product_id', $product['product_id'])->first();

        $stock->update([
            'quantity' => $stock->quantity - $product['quantity'], // quantity of product from order
        ]);

        }

        

    }
    
       $billproducts = BillProduct::where('bill_id',$bills->id)->get();

               $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'orderid' => 'required',
            // 'userid' => 'required',
            'paymentid' => 'required',
            'transaction_type' => 'required',
            'transaction_signature' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'remarks' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }
        $transaction = new Transaction();
        $transaction->name = $request->input('name');
        $transaction->mobile_number = $request->input('number');
        $transaction->user_type = "customer";
        $transaction->user_id = $request->customer_id;
        $transaction->order_id = $request->input('orderid');
        $transaction->payment_id = $request->input('paymentid');
        $transaction->transaction_type = $request->input('transaction_type');
        $transaction->transaction_signature = $request->input('transaction_signature');
        $transaction->status = $request->input('status');
        $transaction->amount = $request->input('amount');
        $transaction->payment_method = $request->input('payment_method');
        $transaction->remarks = $request->input('remarks');
        $transaction->bill_id = $bills->id;
        $transaction->save();

       return response()->json(['error' => false, 'message' => "Data Added Successfully","order_number"=>$bills->id]);
}

    public function Orders($id){
 
        $orders = Bills::with('billproduct')->withCount('billproduct')->where('customer_id',$id)->orderBy('id','DESC')->paginate(10);
        if($orders->count() > 0){
            return response()->json($orders,200);
        }else{
            return response()->json(['error' =>true, 'message' => "No Orders Found"], 200);
        }
    }


    public static  function email_notification($bill_id){

      $bills =  Bills::where('id',$bill_id)->first();

      $billproducts = BillProduct::where('bill_id',$bill_id)->get();

      $transaction = Transaction::where('bill_id',$bill_id)->first();

      // print_r($billproducts);
      // exit;

      $email = new OrderApprovedMail($bills,$billproducts,$transaction);
      Mail::to('order@sun19.in')
        ->send($email);

      // check for failures
      if (Mail::failures()) {
      // return response showing failed emails
      }

      $notification_message = new NotificationMessage;
      $customer_id = $bills->customer_id;

   //  print($id);

     $notification_message->t_title = "New Order Received $bill_id";
     $notification_message->t_message =  "New Order # $bill_id of ₹$bills->total_amount Has been Received";
     $notification_message->customer_id = $bills->customer_id;
     $notification_message->save();

     $optionBuilder = new OptionsBuilder();
     $optionBuilder->setTimeToLive(60*20);

     $notificationBuilder = new PayloadNotificationBuilder($notification_message->t_title);
     $notificationBuilder->setBody($notification_message->t_message)
                         ->setSound('default');

     $dataBuilder = new PayloadDataBuilder();
     $dataBuilder->addData(['a_data' => 'my_data']);

     $option = $optionBuilder->build();
     $notification = $notificationBuilder->build();
     $data = $dataBuilder->build();

    // You must change it to get your tokens
     $tokens = Users::where('id',$bills->customer_id)->pluck('device_token')->toArray();
            // print_r($tokens);
     $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

  //print_r($downstreamResponse);

     $notification_message = NotificationMessage::all();

    Bills::where('id',$bill_id)
     ->update(['email_sent' => 1,
      'notification_sent' => 1,
      ]);
      
 return response()->json(['error' =>false, 'message' => "Email Sent Successfully"], 200);
    }


    public function cancelbill(Request $request)
    {          
      
      $validator = Validator::make($request->all(), [
            'bill_id' => 'required',
            'customer_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }
      $bill_id = $request->input('bill_id');

       Bills::where('id',$bill_id)
     ->update(['status' => "Cancel",
      ]);

       $customer_id = $request->input('customer_id');



      // exit;

   //  print($id);
     $notification_message = new NotificationMessage;
     $notification_message->t_title = "Order Cancelled $bill_id";
     $notification_message->t_message =  "Order Cancelled #$bill_id";
     $notification_message->customer_id = $customer_id;
     $notification_message->save();

     $optionBuilder = new OptionsBuilder();
     $optionBuilder->setTimeToLive(60*20);

     $notificationBuilder = new PayloadNotificationBuilder($notification_message->t_title);
     $notificationBuilder->setBody($notification_message->t_message)
                         ->setSound('default');

     $dataBuilder = new PayloadDataBuilder();
     $dataBuilder->addData(['a_data' => 'my_data']);

     $option = $optionBuilder->build();
     $notification = $notificationBuilder->build();
     $data = $dataBuilder->build();

    // You must change it to get your tokens
     $tokens = Users::where('id',$customer_id)->pluck('device_token')->toArray();
            // print_r($tokens);
     $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

           $bills =  Bills::where('id',$bill_id)->first();

      $billproducts = BillProduct::where('bill_id',$bill_id)->get();

      $transaction = Transaction::where('bill_id',$bill_id)->first();

      $email = new OrderCancelMail($bills,$billproducts,$transaction);
      Mail::to('order@sun19.in')
        ->send($email);

      // check for failures
      if (Mail::failures()) {
      // return response showing failed emails
      }
      
     return response()->json(['error' =>false, 'message' => "Order Cancelled Successfully"], 200);

    }


    public function allnotsent(Request $request){

      $allnotsents = Bills::where('email_sent',0)->where('notification_sent',0)->get();

      foreach($allnotsents as $allnotsent){

        $bill_id = $allnotsent->id;

        return $this->email_notification($bill_id);
      }

    }

}   
