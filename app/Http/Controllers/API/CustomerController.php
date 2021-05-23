<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\CustomerAddress;
use Intervention\Image\Facades\Image;

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
        
         
  
         

            Users::where('phone', $phone)->update([
              
                'device_token' => $device_token,
                'device_type' => $device_type
               
                ]);

        return response()->json(['error' => false,'data' =>$user]);
    }
    
    }


      //Update Customer Details
    public function update(Request $request){

     
       

     $user  = Users::findorFail($request->input('id'));

           
           $user->business_name = $request->input('business_name');
            $user->category_id = $request->input('category_id');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone1 = $request->input('phone1');
            $user->phone2 = $request->input('phone2');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
         
  
              if ($request->input('photo')) {
            $image = base64_decode($request->input('photo'));
            $name =  $request->input('id').'.png';
            $destinationPath = public_path('/images/logo/');
          Image::make($image)->save($destinationPath.$name);     
  
           $user->photo = $name;
                  }

           
               if($user->update()){
  return response()->json(['error' => false,'data' =>$user]);
               }else{
  return response()->json(['error' => true,'data' =>"Something went"]);
               }
               
            

      
    
    
    }

     public function customerdownloads($customerid){
          
  
         $user  = Users::findorFail($customerid);

         if($user->downloads>$user->todays_downloads)
         {
           $user->todays_downloads = $user->todays_downloads+1;
         }else{
           return response()->json(['error' => false,'data' =>"You Have Already Downloaded"]);
         }
 if($user->update()){
          return response()->json(['error' => false,'data' =>"Success",'user'=>$user]);
 }else{
  return response()->json(['error' => true,'data' =>"Something went Wrong"]);
               }
        
     }


    

 }