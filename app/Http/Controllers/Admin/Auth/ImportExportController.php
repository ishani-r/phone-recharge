<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    
    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request) 
    {
        $this->validate($request,[
            'file' => 'required|mimes:xlsx'
        ]);
        Excel::import(new UsersImport,request()->file('file'));
             
        return back();
    }
}