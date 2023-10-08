<?php

use App\Http\Controllers\ShowPagesController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ShowPagesController::class)->prefix('admin')->group(
    function(){
        Route::get('/users','show_add_users')->name('users');
        Route::get('/org/add','Show_add_org')->name('addorg');
        Route::get('/org','show_all_orgs')->name('orgs.show');
        Route::get('/org_type','show_org_type')->name('org_type');
        Route::get('/alogin','adminlogin')->name('admin.login');
        Route::get('/dashboard','showdashboard')->name('dashboard');
        Route::get('/hoods','show_hoods_view')->name('hoods');
        Route::get('/{id}','getorg');
    }
);
Route::controller(ShowPagesController::class)->group(
    function(){
        Route::get('/ulogin','userlogin')->name('user.login');
    }
);
