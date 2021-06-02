<?php

namespace App\Http\Controllers;

use App\User;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function userRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'mobile' => 'required|numeric|unique:customer',
            'photo' => 'required|image'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => true,'validation'=>$validator->messages()->first()], 200, []);
        }
        if ($request->hasFile('photo')) {
            $image      = $request->file('photo');
            $fileName   = 'images/photo'.'/'.time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $image, 'public');
        }

       $user = new  User();
       $user->name = $request->name;
       $user->mobile = $request->mobile;
       $user->photo = $fileName;
       $user->save();

        return response()->json(['error' => false,'user'=>$user], 200, []);


    }

    public function registered()
    {
        $users = User::Where('usertype','admin')->orWhere('usertype','moderator')->get();
        return view('admin.register')->with('users',$users);
    }

    public function store(Request $request)
    {
      
        $rules = array(
            'name'    =>  'required',
            'phone' => 'required|numeric|unique:users',
            'email' => 'required|unique:users',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {

            Session::flash('statuscode', 'danger');
            return redirect('/role-register')->with('status', $validator->messages()->first());
            //return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }

        $users = new User();

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $filename = time() . '' . $name;
            Storage::disk('local')->put($filename, file_get_contents($file->getRealPath()));
        }


        if ($request->hasFile('photo')) {
            $users->photo = $filename;
        }

        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->usertype = $request->usertype;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->save();

        Session::flash('statuscode','success');
        return redirect('/role-register')->with('status','Record Inserted Successfully');
    }

    public function registeredit(Request $request,$id)
    {
        $users =   User::findOrFail($id);

        Session::flash('statuscode','success');
        return view('admin.register-edit')->with('users',$users);
    }

    public function registerupdate(Request $request, $id)
    {
        //$userId = $request->hidden_id;
        $rules = array(
            'name'    =>  'required',
            'phone' => [
        'required',
        Rule::unique('users')->ignore($id),
    ],
           'email' => [
        'required',
        Rule::unique('users')->ignore($id),
    ],

            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
{
            Session::flash('statuscode', 'danger');
            return redirect('/role-register')->with('status',  $error->errors()->all());
            ///return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
}

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $filename = time() . '' . $name;
            Storage::disk('local')->put($filename, file_get_contents($file->getRealPath()));
        }

        $users = User::find($id);
        if ($request->hasFile('photo')) {
            $users->photo = $filename;
        }
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->usertype = $request->usertype;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->update();

        Session::flash('statuscode','success');
        return redirect('/role-register')->with('status','Record Updated Successfully');
    }

    public function registerdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        Session::flash('statuscode','success');
        return redirect('/role-register')->with('status','Record Deleted Successfully');
    }

    public function index(){
        $users = Users::where('usertype','customer')
                       ->get(); 
        return view('admin.users',compact('users'));
    }

    public function insert(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric|unique:users',
            'usertype' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {

            Session::flash('statuscode', 'danger');
            return redirect('/users')->with('status', $validator->messages()->first());
            //return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }

        $users = new Users();

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $filename = time() . '' . $name;
            Storage::disk('local')->put($filename, file_get_contents($file->getRealPath()));
        }

        if ($request->hasFile('photo')) {
            $users->photo = $filename;
        }
        
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->usertype = $request->usertype;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        
        $users->save();

        Session::flash('statuscode','success');
        return redirect('/users')->with('status','Record Inserted Successfully');
    }

    public function edit(Request $request,$id)
    {
        $users =   Users::findOrFail($id);

        Session::flash('statuscode','success');
        return view('admin.users-edit')->with('users',$users);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'usertype' => 'required',
            'email' => 'required',
            
        ]);

        if ($validator->fails()) {

            Session::flash('statuscode', 'danger');
            return redirect('/users')->with('status', $validator->messages()->first());
            //return response()->json(['error' => true, 'validation' => $validator->messages()->first()], 200, []);
        }
        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $filename = time() . '' . $name;
            Storage::disk('local')->put($filename, file_get_contents($file->getRealPath()));
        }

        $users = Users::find($id);
        if ($request->hasFile('photo')) {
            $users->photo = $filename;
        }
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->usertype = $request->usertype;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->update();

        Session::flash('statuscode','success');
        return redirect('/users')->with('status','Record Updated Successfully');
    }

    public function delete($id)
    {
        $users = Users::findOrFail($id);
        $users->delete();

        Session::flash('statuscode','success');
        return redirect('/users')->with('status','Record Deleted Successfully');
    }

    
    public function settodaydownloads()
    {

        Users::where('deleted_at','=',NULL)->update(['todays_downloads' => 0]);

        Session::flash('statuscode','success');
        return redirect('/users')->with('status','Records Updated Successfully');
    }
}
