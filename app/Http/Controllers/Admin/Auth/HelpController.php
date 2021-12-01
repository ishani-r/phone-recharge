<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Help;
use App\DataTables\HelpDatatable;
use App\Http\Requests\Admin\HelpRequest;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HelpDatatable $HelpDatatable)
    {
        return $HelpDatatable->render('admin.dashboard.listhelp');
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
    public function store(HelpRequest $request)
    {
        $help = new Help();
        $help->question = $request->question;
        $help->answer = $request->answer;
        $help->status = "Active";
        $help->save();
        return redirect()->route('admin.help.index', compact('help'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $help = Help::find($id);
        return view('admin.dashboard.showhelp', compact('help'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $help = Help::find($id);
        return view('admin.dashboard.edithelp', compact('help'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HelpRequest $request, $id)
    {
        $help = Help::find($id);
        $help->question = $request->question;
        $help->answer = $request->answer;
        $help->save();
        return redirect()->route('admin.help.index', compact('help'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $help = Help::find($id);
        $help->delete();
        return $help;
    }

    public function status(Request $request)
    {
        $id = $request['id'];
        $help = Help::find($id);
        
        if($help->status == "Active")
        {
            $help->status = "Deactive";
        }else{
            $help->status = "Active";
        }
        $help->save();
        return $help;
    }

}
