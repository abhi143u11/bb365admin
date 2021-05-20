<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\NotificationMessage;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;

class NotificationController extends Controller
{
    public function Notification($phone)
    {
        $users = Users::where('phone',$phone)->first();
        $customer_id = $users->id;
        $notification = NotificationMessage::where('customer_id',$customer_id)->orderBy('id', 'DESC')->limit(10)->get();
        return response()->json(['error' => false, 'notification' => $notification], 200, []);

    }
}
