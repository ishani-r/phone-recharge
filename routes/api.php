<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserDetailsController;
use App\Http\Controllers\API\LikeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// -------------------------- User --------------------------
Route::post('login', [LoginController::class, 'login']);
Route::post('insertuser', [UserController::class, 'store']);
Route::get('showuser/{id?}', [UserController::class, 'show']);
Route::put('updateuser/{id}', [UserController::class, 'update']);
Route::delete('deleteuser/{id}', [UserController::class, 'destroy']);

Route::group(['middleware' => 'auth:api'], function () {
    // -------------------------- User Detail --------------------------
    Route::post('insertuserdetail', [UserDetailsController::class, 'store']);
    Route::get('showuserdetail/{id?}', [UserDetailsController::class, 'show']);
    Route::put('updateuserdetail/{id}', [UserDetailsController::class, 'update']);
    Route::delete('deleteuserdetail/{id}', [UserDetailsController::class, 'destroy']);

    // -------------------------------------- Like ----------------------------
    Route::post('likeinsert', [LikeController::class, 'like']);
});