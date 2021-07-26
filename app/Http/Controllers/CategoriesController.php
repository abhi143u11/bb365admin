<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Images;
use App\Models\Categories;
use App\Models\CatDownloads;
use App\Models\SubCategories;
Use DB;
use Auth;


class CategoriesController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.images.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            //'order_no' => 'required|unique:categories',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);
             if ($validator->fails()) {
                Session::flash('statuscode','error');
                return back()->with('status', $validator->messages()->first());
            }

          $categories = new Categories();
          $categories->cat_name = $request->input('name');
          $categories->order_no = $request->input('order_no');
          $categories->active = $request->input('active');
          $categories->cat_type = $request->input('cat_type');
          $categories->subcat = $request->input('subcat');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name =  str_slug($request->input('name'),"_").'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/category/');
            $image->move($destinationPath, $name);
            $categories->img = $name;
                  }
        
        $categories->save();
        Session::flash('statuscode','success');
        return redirect('/categories')
             ->with('status','Data Added Successfully ');

         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $most_download_cate = CatDownloads::with('customers','category')->groupBy('category_id')->orderBy(DB::raw('COUNT(category_id)'),'DESC')->get();
        //dd($most_download_cate);
        // exit;

        return view('admin.most-download-cat.show',compact('most_download_cate'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $categories = Categories::findorFail($id);
       return view('admin.images.editcategories',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
          //  'order_no' => 'required|unique:categories',
         // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          if ($validator->fails()) {
            // return response()->json(['error' => true,'validation'=>$validator->messages()->first()], 200, []);
             Session::flash('statuscode','error');
             return back()->with('status', $validator->messages()->first());
          }
        $categories = Categories::findorFail($id);
        $categories->cat_name = $request->input('name');
        $categories->order_no = $request->input('order_no');
        $categories->active = $request->input('active');
        $categories->cat_type = $request->input('cat_type');
        $categories->subcat = $request->input('subcat');
  
    //    if($image   = $request->file('image')){
    //   $filename = str_replace(' ', '-', time().'1.'.$image->getClientOriginalName());
    //   $image_resize = Image::make($image->getRealPath());
    //   $image_resize->save(public_path('images/' .$filename));
    //   $categories->img = $filename;}

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name =  str_slug($request->input('name'),"_").'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/category/');
        $image->move($destinationPath, $name);
        $categories->img = $name;
              }
   
        $categories->update();
        
        Session::flash('statuscode','info');
        return redirect('/categories')
               ->with('status', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::findorFail($id);
        $filename = $categories->img;
        $imagepath = 'images/'.$filename;
          if(File::exists($imagepath)) {
              File::delete($imagepath);
  
       }
       $categories->delete();
       Session::flash('statuscode','error');
       return redirect('/categories')
             ->with('status', 'Data Deleted successfully');
    }


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

//   public function subcategories($catid)
//     {
//         $subcategories = SubCategories::where('cat_id',$catid)->get();
//         if($subcategories->count() > 0){
//         return response()->json($subcategories);
//     }else{
//         return response()->json("");
//     }
// }


}   
