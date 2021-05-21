<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\OfferSlider;

use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
   
    public function showslider(){
        $slides = OfferSlider::with('subcategories')->get();
        if($slides ->count() > 0){
            return response()->json($slides,200);
        }else{
            return response()->json(['error' => true, 'message' => "No Slide found"], 200);
        }
     
    }

}
