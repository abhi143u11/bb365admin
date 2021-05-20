<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
//use Intervention\Image\ImageManagerStatic as Image;
use App\Models\OfferSlider;
use App\Models\Categories;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showslider(){

        $slides = OfferSlider::with('categories')->get();
        $categories = Categories::all();
        return view('admin.offersslider',compact('slides','categories'));
    }

    public function slider(Request $request)
    {
        {
            $validator = Validator::make($request->all(), [
              'image' => 'required|mimes:jpg,jpeg,png,gif,svg|max:20000'

         ]);
         if ($validator->fails()) {
            Session::flash('statuscode','error');
            return back()->with('status', $validator->messages()->first());
        }
             $offers = new OfferSlider();

            // if($image       = $request->file('image')){
            // $filename = str_replace(' ', '-', time().'.'.$image->getClientOriginalName());
            // $image_resize = Image::make($image->getRealPath());
            // $image_resize->save(public_path('images/' .$filename));
            // $offers->coupon_images = $filename;}

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
                $offers->image = $name;
                      }

            if($request->input('category_id')){
                $offers->category_id = $request->input('category_id');
            }

             $offers->save();

             Session::flash('statuscode','success');
             return redirect('/slider')
                    ->with('status','Data Added successfully');
         }
    }

    public function editslide($id)
    {
        $offerslides = OfferSlider::findorFail($id);
        $categories = Categories::all();
        return view('admin.editofferslides',
              compact('offerslides','categories'));
    }

    public function updateslide(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
             //'image' => 'required',

        ]);
        if ($validator->fails()) {
            Session::flash('statuscode','error');
            return back()->with('status', $validator->messages()->first());
        }

        $offers =  OfferSlider::find($id);

        // if($image      = $request->file('image')){
        // $filename = str_replace(' ', '-', time().'67.'.$image->getClientOriginalName());
        // $image_resize = Image::make($image->getRealPath());
        // $image_resize->save(public_path('images/' .$filename));
        // $offers->image = $filename;}

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $products->image = $name;
                  }

        if($request->input('category_id')){
            $offers->category_id = $request->input('category_id');
        }
                
        $offers->update();
        Session::flash('statuscode','info');
        return redirect('/slider')
                ->with('status','Data Updated Successfully');
    }

    public function destroyslide($id)
    {
        $offers = OfferSlider::findorFail($id);
        $filename = $offers->image;
        $imagepath = 'images/'.$filename;
          if(File::exists($imagepath)) {
              File::delete($imagepath);
            }
        $offers->delete();
 
        Session::flash('statuscode','error');
        return redirect('/slider')
              ->with('status', 'Data Deleted successfully');
    }

}
