<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function allblogs()
    {
        $blogs = Blog::paginate(10);;
        if($blogs ->count() > 0){
            return response()->json($blogs,200);
        }else{
            return response()->json(['error' => true, 'Message' => "No Blogs found"], 200);
        }
    }
    
}