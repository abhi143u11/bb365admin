<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::paginate(10);

        return view('admin.pages')->with('pages',$pages);
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_title' => 'required',
            'page_description' => 'required',

        ]);
        if ($validator->fails()) {
            Session::flash('statuscode','error');
            return back()->with('status', $validator->messages()->first());
        }

         $pages = new Pages();
        $pages->page_title = $request->page_title;
        $pages->page_description = $request->page_description;
        $pages->save();
        Session::flash('statuscode','success');
        return redirect('/pages')
              ->with('status','Data Inserted Successfully');
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
        $pages =   Pages::findOrFail($id);
        return view('admin.editpages')->with('pages',$pages);
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
            'page_title' => 'required',
            'page_description' => 'required',
        ]);
        if ($validator->fails()) {
            Session::flash('statuscode','error');
            return back()->with('status', $validator->messages()->first());
        }

        $pages =  Pages::find($id);
        $pages->page_title = $request->page_title;
        $pages->page_description = $request->page_description ;
        $pages->update();
        Session::flash('statuscode','info');
        return redirect('/pages')
                ->with('status','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Pages::findOrFail($id);
        $pages->delete();
        Session::flash('statuscode','error');
        return redirect('/pages')
               ->with('status','Data Deleted Successfully');
    }
}
