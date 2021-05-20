<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\ProviderServices;
use App\Service;
use App\Category;
use App\Models\Page;
use App\Models\Provider;
use App\Models\ProviderService;
use App\SubService;
use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
