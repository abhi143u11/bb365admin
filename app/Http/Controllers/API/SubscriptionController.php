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
        $subscriptions = Subscription::where('amount','>=',100)
                        ->get();
        return response()->json(['data' => $subscriptions], 200, []);
    }

    // public function store(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'subscription_name' => 'required',
    //         'amount' => 'required',
    //         'credit' => 'required',

    //     ]);

    //     if ($validator->fails()) {

    //         return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
    //     }
    //     $subscriptions = new Subscriptions;

    //     $subscriptions->subscription_name = $request->input('subscription_name');
    //     $subscriptions->amount = $request->input('amount');
    //     $subscriptions->credit = $request->input('credit');


    //     $subscriptions->save();
    //     return response()->json(['error' => false, 'data' => "Data Added"], 200, []);
    //     // Session::flash('statuscode','success');
    //     // return redirect('/subscriptions')->with('status','Record Inserted Successfully');
    // }



    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'subscription_name' => 'required',
    //         'amount' => 'required',
    //         'credit' => 'required',

    //     ]);

    //     if ($validator->fails()) {

    //         return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
    //     }
    //     $subscriptions =  Subscriptions::find($id);
    //     $subscriptions->subscription_name = $request->subscription_name;
    //     $subscriptions->amount = $request->amount;
    //     $subscriptions->credit = $request->credit;

    //     $subscriptions->update();
    //     return response()->json(['error' => false, 'data' => "Data Updated"], 200, []);
    //     // Session::flash('statuscode','info');
    //     // return redirect('/subscriptions')->with('status','Record Updated Successfully');
    // }
}
