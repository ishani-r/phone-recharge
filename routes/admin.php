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
    Route::get('notification', function(){
        return view('admin.dashboard.notification');
    })->name('notification');
    // Route::view('dashboard/master','layouts.master');

    // --------------------------------------Admin Profile-------------------------------------------
    Route::put('update-profile/{id}', 'Auth\ProfileController@updateProfile')->name('update_profile');
    Route::get('dashboard/profile', 'Auth\ProfileController@showProfile')->name('showprofile');
    
    // ------------------------------------ change status -----------------------------------------
    Route::get('dashboard/change', 'Auth\ProfileController@changeStatus')->name('changestatus');
    Route::get('details/change', 'Auth\ProfileController@statusChange')->name('statuschange');
    Route::get('dashboard/password', function(){
        return view('admin.dashboard.changepassword');
    })->name('changepassword');
    Route::post('dashboard/changepass/{id}', 'Auth\ProfileController@changePassword')->name('changepass');

    // --------------------------------------User Profile-------------------------------------------
    Route::resource('dashboard', Auth\UserController::class);
    Route::resource('details', Auth\UserDetailsController::class);

    // ---------------------------------------- Like ---------------------------------------
    // Route::post('dashboard/like', 'Auth\LikeController@like')->name('like');
    Route::get('notification', 'Auth\LikeController@notification')->name('notification');
    Route::delete('delete/{id}', 'Auth\LikeController@destroy')->name('delete');
});
?>