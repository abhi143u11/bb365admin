<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\Users;
use App\Models\Images;
use App\Models\BillProduct;
use App\Models\Transaction;
use App\Models\ProductsCategories;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
Use DB;
use App\Models\NotificationMessage;
use Auth;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Carbon\Carbon;
use DataTables;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bills::with('users')->orderBy('id','desc')->get();
       
        $customers = Users::where('usertype','customer')->get();
        return view('admin.bills',compact('bills','customers'));
    }

    // public function index2(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data =  Bills::with('users')orderBy('id','desc')->get();
    //         return DataTables::of($data)
    //                 ->addIndexColumn()
    //                 ->addColumn('action', function($row){
   
    //                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Edit"  data-id="'.$row->id.'"  class="edit btn btn-warning btn-sm editProduct"> <i class="fa fa-edit"></i></a>';
   
    //                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"> <i class="fa fa-trash"></i></a>';
    
    //                         return $btn;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getbilldata($billid)
    {
        $biils = Bills::where("id",$billid)
        ->select('total_amount','customer_id')->first();

        $transaction =  Transaction::where("bill_id",$billid)
        ->select('payment_id','payment_method','transaction_type')->first();

        $billproducts = BillProduct::where("bill_id",$billid)
        ->get();

        // print_r($transaction);
        // exit;

       $table = "<table class='table'>";
        foreach($billproducts as $billproduct)
        {
        $table .="<tr id='".$billproduct->id."' ><td> <img width='100px' src=https://admin.sun19.in/images/products/".$billproduct->image."></td><td>".$billproduct->product_name."</td><td>".$billproduct->size."</td><td>".$billproduct->quantity."</td><td>₹".$billproduct->mrp."</td><td>₹".$billproduct->sub_total."</td></tr>";
        } 
        $table .="</table>";

        $table2 = "<table class='table'>";

        $table2 .="<tr id='".$biils->customer_id."'><td><b>Order Total: </b>".$biils->total_amount."</td></tr>";

        $table2 .="</table>";

        $table3 = "<table class='table'>";

        $table3 .="<tr><th>Transaction Details:</th></tr></tr><tr id='".$transaction->payment_id."' ><td><b>Payment Id: </b>".$transaction->payment_id."</td><td><b>Payment Method: </b>".$transaction->payment_method."</td><td><b>Transaction Type: </b>".$transaction->transaction_type."</td></tr>";

        $table3 .="</table>";

        return json_encode(array($table,$table2,$table3));
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
            'name' => 'required',
            'mobile' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('statuscode','error');
            return back()->with('status', $validator->messages()->first());
        }

         $bills = new Bills();
         $name = $request->name;
        $id_name = explode("|",$name);
         for($i = 0; $i < count($id_name); $i++) {
            $bills->customer_id = $id_name[0];
            $bills->name = $id_name[1]; 
        }
        
        $bills->mobile = $request->mobile;
        $bills->area = $request->area;
        $bills->state = $request->state;
        $bills->city = $request->city;
        $bills->bill_date = $request->date;
        $bills->notes = $request->notes;
        $bills->pincode = $request->pincode;
        $bills->status = $request->status;
        $bills->coupon_code = $request->coupon_code;
        $bills->discount = $request->discount;
        $bills->sub_total = $request->sub_total;
        $bills->total_amount = $request->total_amount;

        $bills->save();
        
        Session::flash('statuscode','success');
        return redirect('/bill')
              ->with('status','Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $bills =   Bills::findOrFail($id);
        if($bills->status != 'Delivered' && $bills->status != 'Cancel'){
            $billproducts = BillProduct::where('bill_id',$id)->with('categories','products')->get();
            $customers = Users::all();
            $products = Products::all();
            $categories = ProductsCategories::all();
            return view('admin.editbills',compact('bills','customers','categories','products','billproducts'));
        }else{
            Session::flash('statuscode','error');
            return redirect('/bill')
                  ->with('status','You Are Not Authorized');
        }
       
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
           // 'name' => 'required',
           // 'mobile' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('statuscode','error');
            return back()->with('status', $validator->messages()->first());
        }
        
        $bills =  Bills::find($id);
        $bills->status = $request->status;

         $bills->update();

        // print_r($bills->customer_id);
        // exit;

        $notification_message = new NotificationMessage;
        $customer_id = $bills->customer_id;
  
     //  print($id);
  
       $notification_message->t_title = "Your Order is $request->status";
       $notification_message->t_message =  "Your Order is $request->status";
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

    
        Session::flash('statuscode','info');
        return redirect('/bill')
                ->with('status','Data Updated Successfully');
    }

    public function updatestatus($billid)
    {
        
        $bills =  Bills::find($billid);
        $bills->status = "Delivered";
        $bills->update();

        // print_r($bills->customer_id);
        // exit;

        $notification_message = new NotificationMessage;
        $customer_id = $bills->customer_id;
  
     //  print($id);
  
       $notification_message->t_title = "Your Order is Delivered";
       $notification_message->t_message =  "Your Order is Delivered";
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

       return json_encode('Delivered');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $bills = Bills::findOrFail($id);
        $bills->delete();

        Session::flash('statuscode','error');
        return redirect('/bill')
               ->with('status','Data Deleted Successfully');
    }

    public function invoice($id){
        $bills =   Bills::where('id',$id)->with('billproduct')->first();
        return view('admin.invoice.create',compact('bills'));
    }

    public function miniinvoice($id){
        $bills =   Bills::where('id',$id)->with('billproduct')->first();
        return view('admin.invoice.mini-invoice',compact('bills'));
    }
}
