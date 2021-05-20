<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function allvideos()
    {
        $videos = Video::paginate(10);
        if($videos ->count() > 0){
            return response()->json($videos,200);
        }else{
            return response()->json(['error' => true, 'Message' => "No Videos found"], 200);
        }
    }
    
}