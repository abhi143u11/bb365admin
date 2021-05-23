<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategories;


class CategoriesController extends Controller
{
  
      public function allcategories()
    {
        $categories = Categories::where('cat_type',1)->where('active',1)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}

      public function categorieswithsub()
    {
        $categories = Categories::with('subcategories')->where('cat_type',2)->where('active',1)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
    }

     public function subcategorieslist()
    {
        $categories = SubCategories::with('imagelist')->where('active',1)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}

    public function catbybusiness($catid)
    {
        $categories = Categories::with('subcategories')->where('id',$catid)->where('active',1)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}

   public function subcatimages($subcatid)
    {
        $categories = Subcategories::with('images')->where('sub_cat_id',$subcatid)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}
}