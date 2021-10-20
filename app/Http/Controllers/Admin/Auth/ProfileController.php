<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('admin.dashboard.editprofile');
    }

    public function updateProfile(Request $request)
    {
        // dd(1);
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

    public function changePassword()
    {
        dd("password");
    }
    public function changeStatus(Request $request)
    {
        $id = $request['id'];
        $user = User::find($id);
        
        if($user->status == "1")
        {
            $user->status = "0";
        }else{
            $user->status = "1";
        }
        $user->save();
        return $user;        
    }
}
