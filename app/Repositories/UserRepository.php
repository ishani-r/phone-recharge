<?php
namespace App\Repositories;
use App\Contracts\UserContract;
use App\Models\User;

class UserRepository implements UserContract
{
    public function show($id)
    {
        $data = User::find($id);
        return $data;
    }
}
?>