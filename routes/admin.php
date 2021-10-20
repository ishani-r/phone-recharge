<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'auth:admin'], function () {
	Route::get('dashboard/content', function(){
        return view('admin.dashboard.content');
    })->name('main');
    Route::view('dashboard/master','layouts.master');
    // --------------------------------------Admin Profile-------------------------------------------
    Route::put('update-profile/{id}', 'Auth\ProfileController@updateProfile')->name('update_profile');
    Route::get('dashboard/profile', 'Auth\ProfileController@showProfile')->name('showprofile');
    Route::post('dashboard/changepass', 'Auth\ProfileController@changePassword')->name('changepass');
    Route::get('dashboard/change', 'Auth\ProfileController@changeStatus')->name('changestatus');
    // --------------------------------------User Profile-------------------------------------------
    Route::resource('dashboard', Auth\UserController::class);
    
});
?>