<?php
namespace App\Repositories;
use App\Contracts\LikeContract;
use App\Models\Like;
use App\Models\Notification;

class LikeRepository implements LikeContract
{
    public function like(array $array)
    {
        // dd("repo");
        $like = new Like();
        $like->user_id = $array['user_id'];
        $like->post_id = $array['post_id'];
        $like->status = $array['status'];
        $like->save();

        Notification::create([
            'user_id'=>$like->user_id,
            'title'=>"ishani",
            'message'=>"Like Your Profile",
            'sender_user_id'=>$like->post_id,
            'status'=>$like->status,
        ]);
        return $like;
    }
}
?>