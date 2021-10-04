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
use App\Models\SubCategories;
use DB;
use Auth;


class SubCategoriesController extends Controller
{

    public function subcategories($catid)
    {
        $subcategories = SubCategories::where('cat_id', $catid)->get();
        if ($subcategories->count() > 0) {
            return response()->json($subcategories);
        } else {
            return response()->json("");
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::orderby('cat_type', 'desc')->get();
        $subcategories = SubCategories::with('categories')->get();
        return view('admin.images.subcategories', compact('categories', 'subcategories'));
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
    { {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                //'order_no' => 'required|unique:categories',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if ($validator->fails()) {
                Session::flash('statuscode', 'error');
                return back()->with('status', $validator->messages()->first());
            }

            $subcategories = new SubCategories();
            $subcategories->cat_id = $request->input('category_id');
            $subcategories->sub_cat_name = $request->input('name');
            $subcategories->active = $request->input('active');
            if (!empty($request->input('festival_date'))) {
                $subcategories->festival_date = $request->input('festival_date');
            }


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $ImageUpload = Image::make($image);

                $ImageUpload->resize(300, 300);

                $thumbnailPath = public_path('/images/thumbnails/');
                $ImageUpload = $ImageUpload->save($thumbnailPath . $name);


                $image = $request->file('image');
                // $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/subcategory/');
                $image->move($destinationPath, $name);
                $subcategories->img = $name;
            }

            $subcategories->save();
            Session::flash('statuscode', 'success');
            return redirect('/subcategories')
                ->with('status', 'Data Added Successfully ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = SubCategories::findorFail($id);
        $categories = Categories::orderby('cat_type', 'desc')->get();
        return view('admin.images.editsubcategories', compact('categories', 'subcategory'));
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
            Session::flash('statuscode', 'error');
            return back()->with('status', $validator->messages()->first());
        }
        $subcategories = SubCategories::findorFail($id);
        $subcategories->cat_id = $request->input('category_id');
        $subcategories->sub_cat_name = $request->input('name');
        $subcategories->active = $request->input('active');
        if (!empty($request->input('festival_date'))) {
            $subcategories->festival_date = $request->input('festival_date');
        }

        //    if($image   = $request->file('image')){
        //   $filename = str_replace(' ', '-', time().'1.'.$image->getClientOriginalName());
        //   $image_resize = Image::make($image->getRealPath());
        //   $image_resize->save(public_path('images/' .$filename));
        //   $categories->img = $filename;}

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $ImageUpload = Image::make($image);

            $ImageUpload->resize(300, 300);

            $thumbnailPath = public_path('/images/thumbnails/');
            $ImageUpload = $ImageUpload->save($thumbnailPath . $name);


            $image = $request->file('image');
            // $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/subcategory/');
            $image->move($destinationPath, $name);
            $subcategories->img = $name;
        }

        $subcategories->save();
        return redirect('/subcategories')
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
        $categories = SubCategories::findorFail($id);

        $categories->delete();
        $imgs =  Images::where('sub_cat_id', $id)->get();
        foreach ($imgs as $img) {


            $filename = $img->image;
            $imagepath =
                public_path('/images/thumbnails/' . $filename);

            if (File::exists($imagepath)) {
                File::delete($imagepath);
            }
            $imagepath =
                public_path('/images/images/' . $filename);
            if (File::exists($imagepath)) {
                File::delete($imagepath);
            }
            $imgs =  Images::where('sub_cat_id', $id)->delete();
        }



        Session::flash('statuscode', 'error');
        return redirect('/subcategories')
            ->with('status', 'Data Deleted successfully');
    }


    public function allcategories()
    {
        $categories = Categories::where('active', 1)->get();
        if ($categories->count() > 0) {
            return response()->json(['error' => false, 'data' =>  $categories], 200);
        } else {
            return response()->json(['error' => true, 'data' => "No Categories Found"], 200);
        }
    }

    public function categorieswithsub()
    {
        $categories = Categories::with('subcategories')->where('active', 1)->get();
        if ($categories->count() > 0) {
            return response()->json(['error' => false, 'data' =>  $categories], 200);
        } else {
            return response()->json(['error' => true, 'data' => "No Categories Found"], 200);
        }
    }
}
