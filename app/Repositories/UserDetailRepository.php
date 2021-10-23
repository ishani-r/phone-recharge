<?php
namespace App\Repositories;
use App\Contracts\UserDetailContract;
use App\Models\UserDetail;
use App\Models\User;

class UserDetailRepository implements UserDetailContract
{
    public function store(array $array)
    {
        $user = new UserDetail();
        $user->user_id = $array['user_id'];
        $user->country = $array['country'];
        $user->state = $array['state'];
        $user->city = $array['city'];
        $user->address = $array['address'];
        $user->education = $array['education'];
        $user->work = $array['work'];
        $user->employer = $array['employer'];
        $user->about_me = $array['about_me'];
        $user->height = $array['height'];
        $user->speaks = $array['speaks'];
        $user->cast = $array['cast'];
        $user->smoking = $array['smoking'];
        $user->drinks = $array['drinks'];
        $user->food = $array['food'];
        $user->marray_age = $array['marray_age'];
        $user->dressing = $array['dressing'];
        $user->status = $array['status'];
        $user->slug = $array['slug'];
        $user->save();
        return $user;
    }

    public function show($id)
    {
        $dataa = $id ? UserDetail::find($id):UserDetail::all();
        $user = User::where("id" , $dataa['id'])->get();
        $data['data'] = $dataa;
        $data['user'] = $user;
        return $data;
    }

    public function update(array $array, $id)
    {
        $user = UserDetail::find($id);
        $user->user_id = $array['user_id'];
        $user->country = $array['country'];
        $user->state = $array['state'];
        $user->city = $array['city'];
        $user->address = $array['address'];
        $user->education = $array['education'];
        $user->work = $array['work'];
        $user->employer = $array['employer'];
        $user->about_me = $array['about_me'];
        $user->height = $array['height'];
        $user->speaks = $array['speaks'];
        $user->cast = $array['cast'];
        $user->smoking = $array['smoking'];
        $user->drinks = $array['drinks'];
        $user->food = $array['food'];
        $user->marray_age = $array['marray_age'];
        $user->dressing = $array['dressing'];
        $user->status = $array['status'];
        $user->slug = $array['slug'];
        $user->save();
        return $user;
    }

    public function destroy($id)
    {
        $user = UserDetail::find($id);
        $user->delete();
        return $user;
    }
}
?>