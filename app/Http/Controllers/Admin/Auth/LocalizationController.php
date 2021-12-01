<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.language');
    }

    public function langchange(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return view('admin.dashboard.language');
    }
}