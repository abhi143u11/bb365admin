<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User as Student;
use App\User as Instructor;
use App\Models\Users;
use App\Models\Transaction;
use App\Models\OfferSlider;

use App\Models\Bills;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_customers = Users::where('usertype','customer')->where('beepixl',0)->count();
        $todays_customers = Users::where('usertype','customer')->where('beepixl',0)->whereDate('created_at',date('Y-m-d'))->count();
        $total_slides = OfferSlider::all()->count();
        $todays_orders = Transaction::whereDate('created_at',date('Y-m-d'))->count();
        $total_orders = Transaction::all()->count();
        $todays_amount = Transaction::whereDate('created_at',date('Y-m-d'))->sum('amount');
        $total_amount = Transaction::sum('amount');
        $todays_transaction = Transaction::whereDate('created_at',date('Y-m-d'))->orderBy('transaction_id','desc')->get();
              
  return view('admin.dashboard',compact('total_customers','total_slides','todays_orders','total_orders','todays_customers','todays_amount','total_amount','todays_transaction'));
      
    }
}
