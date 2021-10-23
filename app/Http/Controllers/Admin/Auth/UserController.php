<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\UserRequest;

use App\Contracts\UserContract;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function __construct(UserContract $User)
    {
        $this->User = $User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        // $user = User::all();
        return $dataTable->render('admin.dashboard.userlist');
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
        $data = $this->User->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->User->show($id);
        return view('admin.dashboard.showuser', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.dashboard.edituser', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        if($request->hasfile('image'))
        {
            $destination = 'storage/admin/'.$user->image;
            if(file::exists($destination))
            {
                file::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            // dd($extension);
            $filename = time().'.'.$extension;
            $file->move('storage/admin/',$filename);
            $user->image = $filename;
        }
        $user->save();
        return redirect()->route('admin.dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->User->destroy($id);
        return $data;
    }

   
}
