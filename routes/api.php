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

Route::get('get_streets',[\App\Http\Controllers\Api\UserDataContoller::class,'get_streets']);
Route::get('get_orgs',[\App\Http\Controllers\Api\UserDataContoller::class,'get_orgs']);
Route::post('user_get_org',[\App\Http\Controllers\Api\UserDataContoller::class,'user_get_org']);
Route::post('login', [AuthController::class,'login']);
Route::post('logout', [AuthController::class, 'logout']);




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
