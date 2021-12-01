<?php

use App\Http\Controllers\Admin\Auth\ImportExportController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard/content', function () {
        return view('admin.dashboard.content');
    })->name('main');
    Route::get('notification', function () {
        return view('admin.dashboard.notification');
    })->name('notification');
    Route::get('package', function () {
        return view('admin.dashboard.package');
    })->name('package')->middleware(['permission:create-package']);
    Route::get('settings', function () {
        return view('admin.dashboard.addteams');
    })->name('addteams')->middleware(['permission:create-terms']);
    Route::get('helps', function () {
        return view('admin.dashboard.help');
    })->name('help')->middleware(['permission:create-question-answer']);
    // Route::get('packageget', function () {
    //     return view('myPDF');
    // });
    Route::get('premium/status', 'Auth\PremiumController@status')->name('statuspermium');
    Route::get('setting/status', 'Auth\SettingController@status')->name('statussetting');
    Route::get('hel/status', 'Auth\HelpController@status')->name('statushelp');
    // Route::view('dashboard/master','layouts.master');

    // --------------------------------------Admin Profile-------------------------------------------
    Route::put('update-profile/{id}', 'Auth\ProfileController@updateProfile')->name('update_profile');
    Route::get('dashboard/profile', 'Auth\ProfileController@showProfile')->name('showprofile');

    // ------------------------------------ change status -----------------------------------------
    Route::get('dashboard/change', 'Auth\ProfileController@changeStatus')->name('changestatus');
    Route::get('details/change', 'Auth\ProfileController@statusChange')->name('statuschange');
    Route::get('dashboard/password', function () {
        return view('admin.dashboard.changepassword');
    })->name('changepassword');
    Route::post('dashboard/changepass/{id}', 'Auth\ProfileController@changePassword')->name('changepass');

    // --------------------------------------User Profile-------------------------------------------
    Route::resource('dashboard', Auth\UserController::class)->middleware(['permission:view-user-table']);
    Route::resource('details', Auth\UserDetailsController::class)->middleware(['permission:view-userdetail-table']);

    // ---------------------------------------- Like ---------------------------------------
    Route::get('notification', 'Auth\LikeController@notification')->name('notification')->middleware(['permission:view-notification']);
    Route::delete('delete/{id}', 'Auth\LikeController@destroy')->name('delete');

    // ---------------------------------------- Premium Package ---------------------------------------
    Route::resource('premium', Auth\PremiumController::class);
    // ---------------------------------------- Setting ---------------------------------------
    Route::resource('setting', Auth\Settingcontroller::class);

    // ---------------------------------------- Localization ---------------------------------------
    Route::get('index', 'Auth\LocalizationController@index')->name('language')->middleware(['permission:view-language']);
    Route::get('change/lang', 'Auth\LocalizationController@langchange')->name('LangChange');

    // ---------------------------------------- Help ---------------------------------------
    Route::resource('help', Auth\HelpController::class);

    // ---------------------------------------- Contact US ---------------------------------------
    Route::get('contactus', 'Auth\ContactController@contactUs')->name('contactus')->middleware(['permission:view-contacts-replay']);
    Route::get('replay/{id}', 'Auth\ContactController@replay')->name('replay');
    Route::post('replayuser/{id}', 'Auth\ContactController@replayUser')->name('replayuser');
    Route::get('showreplay', 'Auth\ContactController@showreplay')->name('showreplay');
    Route::post('deletereplaylist/{id}', 'Auth\ContactController@destroyReplayList')->name('deleteReplayList');
    Route::post('deletereplay/{id}', 'Auth\ContactController@deleteReplay')->name('deleteReplay');
    
    // ---------------------------------------- Excal ---------------------------------------
    Route::get('importExportView', [ImportExportController::class, 'importExportView']);
    Route::get('export', [ImportExportController::class, 'export'])->name('export');
    Route::post('import', [ImportExportController::class, 'import'])->name('import');

    // ---------------------------------------- PDF ---------------------------------------
    Route::get('getAllPackage', 'Auth\PdfController@getAllPackage');
    Route::get('exportPDF', 'Auth\PdfController@exportPDF')->name('exportpdf');
    // Route::get('getAllPackage', 'Auth\PdfController@getAllPackage')->name('getpackage');
    
    // ---------------------------------------- Permission ---------------------------------------
    Route::resource('permission', Auth\PermissionController::class)->middleware(['permission:view-permission-table']);

    // ---------------------------------------- Permission ---------------------------------------
    Route::resource('role', Auth\RoleController::class)->middleware(['permission:view-role-table']);
    // ---------------------------------------- Admin ---------------------------------------
    Route::resource('adminuser', Auth\AdminController::class)->middleware(['permission:view-admin-table']);
});
