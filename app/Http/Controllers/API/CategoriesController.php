<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategories;
use Carbon\Carbon;


class CategoriesController extends Controller
{
  
      public function allcategories()
    {
        $categories = Categories::where('cat_type',1)->where('active',1)->orderBy('order_no','asc')->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}

      public function categorieswithsub()
    {
  

 $categories = Categories::where('active', 1)->where('cat_type',2)->with('subcategories')->has('subcategories')->orderBy('order_no','asc')->get();

        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
    }

    
      public function categorieswithfestival()
    {
  

 $categories = SubCategories::where('active',1)->whereDate('festival_date','>=',Carbon::today())->with('images')->has('images')->orderBy('festival_date','asc')->get();

        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
    }
      public function categorieswithfestivalvideo()
    {
  

 $categories = SubCategories::where('active',1)->whereDate('festival_date','>=',Carbon::today())->with('video')->has('video')->orderBy('festival_date','asc')->get();

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
        $categories = Subcategories::with(['images' => function($query) {
    $query->where('post_type', 1)->inRandomOrder();
}])->where('sub_cat_id',$subcatid)->inRandomOrder()->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}

   public function subcatvideos($subcatid)
    {
        $categories = Subcategories::with(['images' => function($query) {
    $query->where('post_type', 3);
}])->where('sub_cat_id',$subcatid)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}

   public function subcatstoryimages($subcatid)
    {
        $categories = Subcategories::with(['images' => function($query) {
    $query->where('post_type', 1);
}])->where('sub_cat_id',$subcatid)->get();
        if($categories->count() > 0){
        return response()->json(['error' =>false, 'data' =>  $categories],200);
    }else{
        return response()->json(['error' =>true, 'data' => "No Categories Found"], 200);
    }
}
}