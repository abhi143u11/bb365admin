<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function transaction()
    {
        $transactions = Transaction::all();
        if($transactions ->count() > 0){
            return response()->json($transactions,200);
        }else{
            return response()->json(['error' => true, 'Message' => "No Transaction found"], 200);
        }
    }

    public function transactionstore(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'usertype' => 'required',
            'orderid' => 'required',
            'userid' => 'required',
            'paymentid' => 'required',
            'transaction_type' => 'required',
            'transaction_signature' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'remarks' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }
        $transaction = new Transaction();
        $transaction->name = $request->input('name');
        $transaction->mobile_number = $request->input('number');
        $transaction->user_type = $request->input('type');
        $transaction->user_id = $request->input('userid');
        $transaction->order_id = $request->input('orderid');
        $transaction->payment_id = $request->input('paymentid');
        $transaction->transaction_type = $request->input('transaction_type');
        $transaction->transaction_signature = $request->input('transaction_signature');
        $transaction->status = $request->input('status');
        $transaction->amount = $request->input('amount');
        $transaction->payment_method = $request->input('payment_method');
        $transaction->remarks = $request->input('remarks');
        $transaction->save();

        return response()->json(['error' => true, 'Message' => "Transaction Added Successfully"], 200);

    }
    
}