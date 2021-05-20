<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User as Student;
use App\User as Instructor;
use App\Models\Users;
use App\Models\OfferSlider;

use App\Models\Bills;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_customers = Users::where('usertype','customer')->count();
        $todays_customers = Users::where('usertype','customer')->whereDate('created_at',date('Y-m-d'))->count();
        $total_slides = OfferSlider::all()->count();
        $todays_orders = Bills::whereDate('created_at',date('Y-m-d'))->count();
        $total_orders = Bills::all()->count();
        $todays_amount = Bills::whereDate('created_at',date('Y-m-d'))->sum('total_amount');
        $total_amount = Bills::sum('total_amount');
        $bills = Bills::with('users')->whereDate('created_at',date('Y-m-d'))->orderBy('id','desc')->get();
        $pending_orders = Bills::where('status','ordered')->get();

        $orders = Bills::select(
            DB::raw('sum(total_amount) as sums'), 
            DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as days"))
           // ->whereMonth('created_at','>=',Carbon::now()->subMonth()->month)
            ->groupBy('days')
            ->get();

              
        return view('admin.dashboard',compact('total_customers','total_slides','todays_orders','total_orders','todays_customers','todays_amount','total_amount','bills','pending_orders','orders'));
        //return response()->json(['error' => false, 'data' => $request_count], 200, []);
    }
}
