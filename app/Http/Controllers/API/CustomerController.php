<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\CustomerAddress;

class CustomerController extends Controller
  {


    public function index(){
        $users = Users::all(); 

        return response()->json(['error' => true, 'data' => $users]); 
    }


    /*
        Get Customer Details with Phone number
    */


 //Displaying Customer details like Wallet,Address and Cards

    public function customerdetails($phonenumber){
    
        $customerdetails = Users::where('phone',$phonenumber)
                           ->with('address')
                           ->get();
        if($customerdetails->count() > 0){
        //return response()->json(['error' => false, 'customer' => $customerdetails]);
        return response()->json($customerdetails,200);
        }else{
            return response()->json(['error' =>true, 'customer' => "No Data Found"], 200);}
        
    }
    

  //Creating Customer Along With wallet and Card 
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'device_token' => 'required',
            'device_type' => 'required',
          ]);
  
          if ($validator->fails()) {
              return response()->json(['error' => true, 'validation' => $validator->messages()->first()]);
              //return response()->json(['error' => true, 'validation' => $validator->messages()->first()]);
          }

        $phone = $request->input('phone');
        $user = Users::where('phone', '=', $phone)->first();

        if($user == null){
          $customers = new Users;
       
          $customers->phone  = $request->input('phone');    
     
           $customers->device_token = $request->input('device_token');
          $customers->device_type = $request->input('device_type');
          

          $customers->usertype = "customer";
    
          $customers->save();

         $customerid = $customers->id;
           $user = Users::where('phone', '=', $customers->phone)->first();

    return response()->json(['error' => false, 'data' =>$user]);

    }else{

            $device_token = $request->input('device_token');
            $device_type = $request->input('device_type');
            $business_name = $request->input('business_name');
            $category_id = $request->input('category_id');
            $phone2 = $request->input('phone2');
            $address = $request->input('address');
            $city = $request->input('city');
         
  
              if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name =  str_slug($request->input('name'),"_").'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/logo/');
            $image->move($destinationPath, $name);
            $photo = $name;
                  }

            Users::where('phone', $phone)->update([
                'device_token' => $device_token,
                'business_name' => $business_name,
                'category_id' => $category_id,
                'phone2' => $phone2,
                'address' => $address,
                'city' => $city,
                'device_token' => $device_token,
                'device_type' => $device_type,
               
                ]);

        return response()->json(['error' => false,'data' =>$user]);
    }
    
    }

    

 }




