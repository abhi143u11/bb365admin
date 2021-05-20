<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categories;


class CategoriesController extends Controller
{
  
      public function allcategories()
    {
        $categories = Categories::where('active',1)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}

      public function categorieswithsub()
    {
        $categories = Categories::with('subcategories')->where('active',1)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}

}   
