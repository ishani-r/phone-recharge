<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\DataTables\SettingDataTable;
use App\Http\Requests\Admin\SettingRequest;

use App\Contracts\SettingContract;
use App\Repositories\SettingRepository;

class SettingController extends Controller
{
    public function __construct(SettingContract $Setting)
    {
        $this->Setting = $Setting;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SettingDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.listteams');
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
    public function store(SettingRequest $request)
    {
        $set = $this->Setting->store($request->all());
        return redirect()->route('admin.setting.index',compact('set'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $set = $this->Setting->show($id);
        return view('admin.dashboard.showteams', compact('set'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $set = Setting::find($id);
        return view('admin.dashboard.editsetting', compact('set'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $set = $this->Setting->update($request->all(),$id);
        return redirect()->route('admin.setting.index', compact('set'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $set = $this->Setting->destroy($id);
        return $set;
    }

    public function status(Request $request)
    {
        $id = $request['id'];
        $set = Setting::find($id);
        
        if($set->status == "Active")
        {
            $set->status = "Deactive";
        }else{
            $set->status = "Active";
        }
        $set->save();
        return $set; 
    }
}
