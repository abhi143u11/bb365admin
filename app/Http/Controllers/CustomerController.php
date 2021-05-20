<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\ImageManagerStatic as Image;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Wallets;
use App\Models\Transaction;
use DB;
use Auth;
use App\Models\NotificationMessage;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $customers = Users::where('usertype','customer')->get();
        return view('admin.customers.customers',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create($id)
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
            'phone' => 'required|numeric|unique:users'
          ]);
  
          if ($validator->fails()) {
            Session::flash('statuscode','error');
            return back()->with('status', $validator->messages()->first());
        }
  
          $customers = new Users;
          $customers->name = $request->input('name');
          $customers->phone  = $request->input('phone');
          $customers->usertype = "customer";
    
          $customers->save();

      Session::flash('statuscode','success');
      return redirect('/customers')
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
        $customers = Users::findorfail($id);
       
        return view('admin.customers.editcustomers',compact('customers'));
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
            'name' => 'required',
            'mobile' => 'required',

             ]);
             if ($validator->fails()) {
                Session::flash('statuscode','error');
                return back()->with('status', $validator->messages()->first());
            }
    
            $customers = Users::findorFail($id);
          $customers->name = $request->input('name');
          $customers->phone  = $request->input('mobile');
    
          $customers->update();
    
        Session::flash('statuscode','success');
        return redirect('/customers')
             ->with('status','Data Updated Successfully ');
    }



  
}                
