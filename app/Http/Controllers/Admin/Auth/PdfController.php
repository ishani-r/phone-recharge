<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Package\Package;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{

	// public function getAllPackage()
	// {
	// 	$package = DB::table("premia")->get();
	// 	return view('myPDF', compact('package'));
	// }

	public function exportPDF(Request $request)
	{
		$package = DB::table("premia")->get();
		view()->share('package', $package);

		$data = ['title' => 'Welcome to HDTuto.com'];
		$pdf = PDF::loadView('myPDF', $data);
		return $pdf->stream();
		// return Redirect::away($pdf->download('listPackage.pdf'));
	}
}