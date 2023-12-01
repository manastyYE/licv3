<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['api']], function () {
    Route::group(['prefix' => 'worker'], function () {
        Route::post('login', [AuthController::class, 'login']);

        Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth.guard:api']);

        Route::get('get_profile', [AuthController::class, 'get_profile'])->middleware(['auth.guard:api']);
        //invalidate token security side
        Route::get('get_streets', [\App\Http\Controllers\Api\UserDataContoller::class, 'get_streets'])->middleware(['auth.guard:api']);

        Route::get('get_orgs', [\App\Http\Controllers\Api\UserDataContoller::class, 'get_orgs'])->middleware(['auth.guard:api']);

        Route::post('user_get_org', [\App\Http\Controllers\Api\UserDataContoller::class, 'user_get_org'])->middleware(['auth.guard:api']);

        Route::post('insert_org_data', [\App\Http\Controllers\Api\UserDataContoller::class, 'insert_org_data'])->middleware(['auth.guard:api']);

        Route::get('get_hood_units', [\App\Http\Controllers\Api\UserDataContoller::class, 'get_hood_units'])->middleware(['auth.guard:api']);

        //broken access controller user enumeration
    });
//    Route::post('login', [AuthController::class, 'login']);
//    Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth.guard:api']);
});




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
