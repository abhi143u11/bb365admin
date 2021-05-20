<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Notification;
use App\User;
use App\Models\NotificationMessage;
use App\Models\Users;
use Illuminate\Support\Facades\File;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Message\Topics;
use FCM;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $notifications = Notification::all();
      return view('admin.notification',compact('notifications'));
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
    
    public function store(Request $request)
    {

             // print_r($request->customer_id);
        // exit;

    if($request->input('customer_id')!="all"){
        $validator = Validator::make($request->all(), [
            't_title' => 'required',
            't_message' => 'required',
            'customer_id' => 'required'

             ]);
             if ($validator->fails()) {
                Session::flash('statuscode','error');
                return back()->with('status', $validator->messages()->first());
         }

        $notification_message = new NotificationMessage;
        $customer_id = $request->input('customer_id');

        $notification_message->t_title = $request->input('t_title');
        $notification_message->t_message = $request->input('t_message');
        $notification_message->customer_id = $request->input('customer_id');

        if($image       = $request->file('image')){
        $filename = str_replace(' ', '-', time().'67.'.$image->getClientOriginalName());
        $image_resize = Image::make($image->getRealPath());
        $image_resize->save(public_path('images/' .$filename));
        $notification_message->image = $filename;}

        $notification_message->save();

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($notification_message->t_title);
        $notificationBuilder->setBody($notification_message->t_message)
                                
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        // $dataBuilder->addData(['data' => 
        // '{
        //     "apns": 
        //     {
        //     "payload": {
        //         "aps": {
        //             "mutable-content": 1
        //         }
        //     },
        //     "fcm_options": {
        //         "image": "https://beepixl.com/wp-content/uploads/2020/01/Group-806.jpg"
        //     }
        //   }
      
        // }'
        // ]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        // You must change it to get your tokens

        $tokens = Users::where('id',$customer_id)->whereNotNull('device_token')->pluck('device_token')->toArray();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        $notification_message = NotificationMessage::all();

    }else{
        $validator = Validator::make($request->all(), [
            't_title' => 'required',
            't_message' => 'required',
        //    'customer_id' => 'required'

             ]);
             if ($validator->fails()) {
                Session::flash('statuscode','error');
                return back()->with('status', $validator->messages()->first());
         }

        $notification_message = new NotificationMessage;
   //     $customer_id = $request->input('customer_id');

        $notification_message->t_title = $request->input('t_title');
        $notification_message->t_message = $request->input('t_message');
      //  $notification_message->customer_id = $request->input('customer_id');

        // if($image       = $request->file('image')){
        // $filename = str_replace(' ', '-', time().'67.'.$image->getClientOriginalName());
        // $image_resize = Image::make($image->getRealPath());
        // $image_resize->save(public_path('images/' .$filename));
        // $notification_message->image = $filename;}

        $notification_message->save();

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($notification_message->t_title);
        $notificationBuilder->setBody($notification_message->t_message)
                                
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        // $dataBuilder->addData(['data' => 
        // '{
        //     "apns": 
        //     {
        //     "payload": {
        //         "aps": {
        //             "mutable-content": 1
        //         }
        //     },
        //     "fcm_options": {
        //         "image": "https://beepixl.com/wp-content/uploads/2020/01/Group-806.jpg"
        //     }
        //   }
      
        // }'
        // ]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        // You must change it to get your tokens

     //   $tokens = Users::where('usertype','customer')->whereNotNull('device_token')->pluck('device_token')->toArray();

      //  $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
        
      $topic = new Topics();
      $topic->topic('sunfarms');
      
      $topicResponse = FCM::sendToTopic($topic, null, $notification, null);
        $notification_message = NotificationMessage::all();


       
    }

        Session::flash('statuscode','success');
        return redirect('/notification-message')
             ->with('status','Data Added Successfully ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $notification_message = NotificationMessage::all();
        $customers  = Users::where('usertype','customer')->get();
      return view('admin.notificationmessage',compact('notification_message','customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
