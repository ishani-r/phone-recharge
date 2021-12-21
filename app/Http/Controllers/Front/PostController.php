<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Point;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::Guard('web')->user()->id;
        $post->title_name = $request->title_name;
        if ($request->image) {
            $file = $request->image;
            $extension = $file->getclientoriginalextension();
            $filename = rand() . '_about.' . $extension;
            $file->move('storage/admin/', $filename);
            $post->image = $filename;
        }
        $post->point = "10";
        $post->save();

        $a = Point::where('user_id', $post->user_id)->get()->count();
        if ($a > 0) {
            $data = Point::where('user_id', $post->user_id)->first();
            $id = $data->id;
            $point = Point::find($id);
            $point->total_post = $data->total_post + 1;
            $point->total_point = $data->total_point + 10;
            $point->save();
        } else {
            $point = new Point();
            $point->user_id = $post->user_id;
            $point->total_post = "1";
            $point->total_point = "10";
            $point->status = "Active";
            $point->save();
        }
        return redirect()->route('home');
    }

    public function sendRequest()
    {
        $total_point = Point::where('user_id', Auth::Guard('web')->user()->id)->first();

        if ($total_point->total_point < 300) {
            Session::flash("error", "Ooops Your Points is less than 300 points.....😔 ");
        } else {
            $id = $total_point->id;
            $point_request = Point::find($id);
            $point_request->user_send_request = "0";
            $point_request->save();
            Session::flash("success", "Request Send Suucessfully.....😊 ");
        }
        return redirect()->route('home');
    }

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
