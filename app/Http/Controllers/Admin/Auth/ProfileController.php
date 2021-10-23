<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;
use App\Models\UserDetail;
use App\Http\Controllers\Session;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('admin.dashboard.editprofile');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required|regex:/(.+)@(.+)\.(.+)/i',
        ]);
        $admin = Admin::find($request->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        // dd($request->name);
        if($request->hasfile('image'))
        {
            $destination = 'storage/admin/'.$admin->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/admin/',$filename);
            $admin->image = $filename;
        }
        $admin->save();
        return redirect()->route('admin.showprofile');
    }

    public function changePassword(Request $request, $id)
    {
        $this->validate($request,[
            'current_password' => 'required',
            'password'=> 'required',
            'confirm_password'=>'required|same:password',
        ]);
        $a=Auth::guard('admin')->user();
        if(Hash::check($request->current_password, $a->password))
        {
            $a->password=Hash::make($request->password);
            $a->save();
        return redirect()->route('admin.main');
        } else {
            return redirect()->back()->with('error', 'Current Password is not match !!');
        }
    }
    public function changeStatus(Request $request)
    {
        $id = $request['id'];
        $user = User::find($id);
        
        if($user->status == "Active")
        {
            $user->status = "Deactive";
        }else{
            $user->status = "Active";
        }
        $user->save();
        return $user;        
    }
    public function statusChange(Request $request)
    {
        $id = $request['id'];
        $user = UserDetail::find($id);
        
        if($user->status == "Active")
        {
            $user->status = "Deactive";
        }else{
            $user->status = "Active";
        }
        $user->save();
        return $user; 
    }
}