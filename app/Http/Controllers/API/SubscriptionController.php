<?php

namespace App\Http\Controllers\API;

use App\Models\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SubscriptionController extends Controller
{
    public function subscriptionPackages()
    {
        $subscriptions = Subscription::where('amount','>=',100)->orderBy('amount','asc')
                        ->get();
        return response()->json(['error'=> false,'data' => $subscriptions], 200, []);
    }

}