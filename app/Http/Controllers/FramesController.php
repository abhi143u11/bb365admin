<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Frames;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class FramesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frames = Frames::with('customer')->get();
        $customers = Users::where('usertype', 'customer')->where('beepixl', 0)->get();

        return view('admin.frames.create', compact('frames', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'customer_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $data = $validator->errors()->all();
            Session::flash('error', $data);
            return back()->with('status', 'Error');
        }
        $frame = new Frames();

        if ($request->frame_img) {
            $image = $request->frame_img;
            $name = time() . rand(1, 9999) . '.' . strtolower($image->getClientOriginalExtension());
            $ImageUpload = Image::make($image);
            $framePath = public_path('images/frames/');
            $ImageUpload = $ImageUpload->save($framePath . $name);
            $frame->frame = $name;
        }

        $frame->customer_phone = $request->customer_name;
        $frame->save();

        Session::flash('success', 'Record Added Successfully');
        return back()->with('status', 'Record Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Frames $frames)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frames  $frames
     */
    public function edit($id)
    {
        $frame = Frames::find($id);
        $customers = Users::where('usertype', 'customer')->where('beepixl', 0)->get();

        return view('admin.frames.edit', compact('frame', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Frames  $frames
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'customer_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $data = $validator->errors()->all();
            Session::flash('error', $data);
            return back()->with('status', 'Error');
        }

        $frame = Frames::find($id);

        if ($request->frame_img) {
            $image = $request->frame_img;
            $name = time() . rand(1, 9999) . '.' . strtolower($image->getClientOriginalExtension());
            $ImageUpload = Image::make($image);
            $framePath = public_path('images/frames/');
            $ImageUpload = $ImageUpload->save($framePath . $name);
            $frame->frame = $name;
        }

        $frame->customer_phone = $request->customer_name;
        $frame->update();

        Session::flash('success', 'Record Added Successfully');
        return redirect('/customer/frame')->with('status', 'Record Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frames  $frames
     */
    public function destroy($id)
    {
        $data = Frames::find($id);
        $image_path = public_path('images/frames/' . $data->frame);

        if (file_exists($image_path)) {
            File::delete($image_path);
        }

        $data->delete();

        Session::flash('success', 'Record Added Successfully');
        return redirect('/customer/frame')->with('status', 'Record Deleted Successfully');
    }
}
