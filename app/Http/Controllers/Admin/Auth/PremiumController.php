<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PremiumDataTable;
use App\Contracts\PremiumContract;
use App\Repositories\PremiumRepository;
use App\Http\Requests\Admin\PackageRequest;
use App\Http\Requests\Admin\EditPackageRequest;
use App\Models\Premium;

class PremiumController extends Controller
{
    public function __construct(PremiumContract $Premium)
    {
        $this->Premium = $Premium;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PremiumDatatable $PremiumDatatable)
    {
        return $PremiumDatatable->render('admin.dashboard.listpackage');
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
    public function store(PackageRequest $request)
    {
        $pre = $this->Premium->store($request->all());
        return redirect()->route('admin.premium.index', compact('pre'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pre = $this->Premium->show($id);
        return view('admin.dashboard.showpackage', compact('pre'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pre = Premium::find($id);
        return view('admin.dashboard.editpackage', compact('pre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPackageRequest $request, $id)
    {
        $pre = $this->Premium->update($request->all(),$id);
        // dd($pre->toArray());
        return $pre;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pre = $this->Premium->destroy($id);
        return $pre;
    }

    public function status(Request $request)
    {
        $id = $request['id'];
        $user = Premium::find($id);
        
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