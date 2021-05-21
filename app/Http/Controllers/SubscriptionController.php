<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::paginate(10);
        return view('admin.subscription')->with('subscriptions',$subscriptions);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subscription_name' => 'required',
            'amount' => 'required',
            'downloads' => 'required',
            'days'=>'required',
            
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }
        $subscriptions = new Subscription;

        $subscriptions->subscription_name = $request->input('subscription_name');
        $subscriptions->amount = $request->input('amount');
        $subscriptions->downloads = $request->input('downloads');
        $subscriptions->days = $request->input('days');

        

        $subscriptions->save();
        
         Session::flash('statuscode','success');
         return redirect('/subscriptions')->with('status','Subscription Inserted Successfully');
    }

    public function edit(Request $request, $id)
    {
        $subscriptions =   Subscription::findOrFail($id);
        return view('admin.subscriptions.edit')->with('subscriptions',$subscriptions);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
           'subscription_name' => 'required',
            'amount' => 'required',
            'downloads' => 'required',
            'days'=>'required',
            
        ]);

        if ($validator->fails()) {

            return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }
        $subscriptions =  Subscription::find($id);
       $subscriptions->subscription_name = $request->input('subscription_name');
        $subscriptions->amount = $request->input('amount');
        $subscriptions->downloads = $request->input('downloads');
        $subscriptions->days = $request->input('days');
        
        $subscriptions->update();
       
         Session::flash('statuscode','info');
         return redirect('/subscriptions')->with('status','Subscription Updated Successfully');
    }

    public function delete($id)
    {
        $subscriptions = Subscription::findOrFail($id);
        $subscriptions->delete();

       
        Session::flash('statuscode','danger');
        return redirect('/subscriptions')->with('status','Subscription Deleted Successfully');
    }
}
