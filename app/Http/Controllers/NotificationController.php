<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Notification;
use App\User;
use App\Models\NotificationMessage;
use App\Models\SubCategories;
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

    $sub_cat_id_name = explode("-",$request->sub_cat_id);

    // print_r($sub_cat_id_name[1]);exit;
  
        $notification_message = new NotificationMessage;


        $notification_message->t_title = $request->input('t_title');
        $notification_message->t_message = $request->input('t_message');
        $path = "";
            if($image = $request->file('image')){
        $filename = str_replace(' ', '-',time().$image->getClientOriginalName());
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
         $path = 
         'https://admin.brandbuilder365.com/images/notification/'.time().'.'.$ext;
   
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(600,400);
        $image_resize->save(public_path('images/notification/' .time().'.'.$ext));
      
        $notification_message->image = $path;
      }
    // dd($path);
        $notification_message->save();

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

 if($path!=""){
        $notificationBuilder = new PayloadNotificationBuilder($notification_message->t_title);
        $notificationBuilder->setBody($notification_message->t_message)
       
                            ->setImage($path)

                            ->setSound('default');
        }else{
               $notificationBuilder = new PayloadNotificationBuilder($notification_message->t_title);
        $notificationBuilder->setBody($notification_message->t_message)
       
                         

                            ->setSound('default');
        }
      
               $dataBuilder = new PayloadDataBuilder();

                if($path!=""){
                      $dataBuilder->addData([
                      "image"=>$path,
                      'category' =>$sub_cat_id_name[0],
                      'category_name' =>$sub_cat_id_name[1],
                      "click_action" => "FLUTTER_NOTIFICATION_CLICK", 
                      
                      "notification_type" => "category",
                      ""=> 'android_channel_id'
                  ]);
                          }else{
                              $dataBuilder->addData([
                    "image"=>$path,
                         'category' =>$sub_cat_id_name[0],
                      'category_name' =>$sub_cat_id_name[1],
                      "click_action" => "FLUTTER_NOTIFICATION_CLICK", 
                      "notification_type" => "category",
                  ]);
        }

        
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

       

        
      $topic = new Topics();
      $topic->topic('bb365');
      
      $topicResponse = FCM::sendToTopic($topic, $option , $notification,   $data );
        $notification_message = NotificationMessage::all();



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
        $subcategories  = SubCategories::all();
      return view('admin.notificationmessage',compact('notification_message','subcategories'));
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