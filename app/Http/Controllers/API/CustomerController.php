<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\CustomerAddress;
use App\Models\CatDownloads;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;


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

    public function userdetail($userid){
    
        $customerdetails = Users::findorFail($userid);
        if($customerdetails->count() > 0){
        //return response()->json(['error' => false, 'customer' => $customerdetails]);
        return response()->json(['error' =>false,'data'=>$customerdetails],200);
        }else{
            return response()->json(['error' =>true, 'data' => "No Data Found"], 200);}
        
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

     
          $validator = Validator::make($request->all(), [
            'id' => 'required',
          ]);
  
          if ($validator->fails()) {
              return response()->json(['error' => true, 'validation' => $validator->messages()->first()]);
              //return response()->json(['error' => true, 'validation' => $validator->messages()->first()]);
          }


     $user  = Users::findorFail($request->input('id'));

   if(!empty($request->business_name)){
       $user->business_name = $request->business_name;
   }
   if(!empty($request->category_id)){
       $user->category_id = $request->category_id;
   }
   if(!empty($request->name)){
        $user->name = $request->name;
   }
   if(!empty($request->email)){
        $user->email = $request->email;
   }
   if(!empty($request->phone1)){
      $user->phone1 = $request->phone1;
   }
   if(!empty($request->address)){
      $user->address = $request->address;
   }
   if(!empty($request->city)){
        $user->city = $request->city;
   }
   
         
           
          
          
           
           // $user->phone2 = $request->input('phone2');
           
           
         
  
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

     public function catdownloads($customerid,$category_id){

   $user  = Users::findorFail($customerid);
  //Check user if package is unlimited
    if($user->unlimited==1){ 
        return response()->json(['error' => false,'data' =>"Success",'user'=>$user]);
      
    }else{

      //check if package is purchased
      if($user->package_type==0){
        return response()->json(['error' => false,'data' =>"Free",'user'=>$user]);
      }else if($user->package_type == 3 && $user->package_end>=Carbon::today()){


        
  $downloadcount = CatDownloads::where('user_id',$customerid)->where('category_id',$category_id)->whereDate('created_at', '=', Carbon::today()->toDateString())->count();



      if($downloadcount<4){
        
     if($user->downloads>$user->todays_downloads)
         {
           $user->todays_downloads = $user->todays_downloads+1;
         }else{
           return response()->json(['error' => false,'data' =>"You Have Already Downloaded"]);
              }
            if($user->update()){
              
          CatDownloads::create([
        'user_id' => $customerid,
        'category_id' => $category_id,
          ]);
                       return response()->json(['error' => false,'data' =>"Festival",'user'=>$user]);

            }else{
              return response()->json(['error' => true,'data' =>"Something went Wrong"]);
               }
              }else{
                  return response()->json(['error' => false,'data' =>"You Have Already Downloaded"]);
              }

        
      }else if($user->package_type == 3 && $user->package_end<Carbon::today()){
        return response()->json(['error' => false,'data' =>"Your Package is Expired",'user'=>$user]);
      }else if($user->package_type == 1 && $user->package_end<Carbon::today()){
        return response()->json(['error' => false,'data' =>"Your Package is Expired",'user'=>$user]);
      }else if($user->package_type == 2 && $user->package_end<Carbon::today()){
        return response()->json(['error' => false,'data' =>"Your Package is Expired",'user'=>$user]);
      }else if($user->package_type == 1 && $user->package_end>=Carbon::today()){

                
  $downloadcount = CatDownloads::where('user_id',$customerid)->where('category_id',$category_id)->whereDate('created_at', '=', Carbon::today()->toDateString())->count();



      if($downloadcount<2){
        
     if($user->downloads>$user->todays_downloads)
         {
           $user->todays_downloads = $user->todays_downloads+1;
         }else{
           return response()->json(['error' => false,'data' =>"You Have Already Downloaded"]);
              }
            if($user->update()){
              
          CatDownloads::create([
        'user_id' => $customerid,
        'category_id' => $category_id,
          ]);
                       return response()->json(['error' => false,'data' =>"Monthly",'user'=>$user]);

            }else{
              return response()->json(['error' => true,'data' =>"Something went Wrong"]);
               }
              }else{
                  return response()->json(['error' => false,'data' =>"You Have Already Downloaded"]);
              }
       
      }else if($user->package_type == 2 && $user->package_end>=Carbon::today()){

                
  $downloadcount = CatDownloads::where('user_id',$customerid)->where('category_id',$category_id)->whereDate('created_at', '=', Carbon::today()->toDateString())->count();



      if($downloadcount<2){
        
     if($user->downloads>$user->todays_downloads)
         {
           $user->todays_downloads = $user->todays_downloads+1;
         }else{
           return response()->json(['error' => false,'data' =>"You Have Already Downloaded"]);
              }
            if($user->update()){
              
          CatDownloads::create([
        'user_id' => $customerid,
        'category_id' => $category_id,
          ]);
                       return response()->json(['error' => false,'data' =>"Yearly",'user'=>$user]);

            }else{
              return response()->json(['error' => true,'data' =>"Something went Wrong"]);
               }
              }else{
                  return response()->json(['error' => false,'data' =>"You Have Already Downloaded"]);
              }
       
      }else{
      
      
      
    return response()->json(['error' => true,'data' =>"Something went Wrong"]);
        
     
    
    }
  }
  }

 }