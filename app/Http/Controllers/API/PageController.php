<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function pagesdetails($page_id)
    {
        $pages = Pages::where('id',$page_id)->get();
        if($pages ->count() > 0){
            return response()->json($pages,200);
        }else{
            return response()->json(['error' => true, 'Message' => "No pages found"], 200);
        }
    }
    
}