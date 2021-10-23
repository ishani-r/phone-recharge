<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contracts\UserDetailContract;
use App\Repositories\UserDetailRepository;

class UserDetailsController extends Controller
{
    public function __construct(UserDetailContract $User)
    {
        $this->User = $User;
    }

    public function store(Request $request)
    {
        // dd("api");
        $user = $this->User->store($request->all());
        return response()->json([
            'message' => 'Data sucessfully inserted',
            'user' => $user
        ]);
    }

    public function show($id=null)
    {
        $user = $this->User->show($id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = $this->User->update($request->all(),$id);
        return response()->json([
            'message' => 'Data Updated Sucessfully',
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = $this->User->destroy($id);
        return "Data Deleted Successfully";
    }
}
