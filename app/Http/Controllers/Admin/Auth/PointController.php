<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function requestStatus(Request $request)
    {
        dd(1);
        $id = $request['id'];
        $user = Point::find($id);
        
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
