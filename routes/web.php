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




Route::controller(ShowPagesController::class)->prefix('admin')->group(
    function(){
        Route::get('/','dashboard_view')->name('dashboard_view');
        Route::get('/org/dashboard','org_dashboard_view')->name('org_dashboard_view');
        Route::get('/users','show_add_users')->name('users');
        Route::get('/org/add','Show_add_org')->name('addorg');
        Route::get('/org','show_all_orgs')->name('orgs.show');
        Route::get('/org_type','show_org_type')->name('org_type');
        Route::get('/alogin','adminlogin')->name('admin.login');
        Route::get('/billboards', 'bill_board_view')->name('billboard.add.edit.del');
        Route::get('/dashboard','showdashboard')->name('dashboard');
        Route::get('/hoods','show_hoods_view')->name('hoods');
        Route::get('/org/show/{id}','getorg');
        Route::get('/office', 'show_office_view')->name('segmanet');
        Route::get('/org/clip/{id}','show_auto_clip')->name('org.autoclipboard');
    }
);
Route::controller(ShowPagesController::class)->group(
    function(){
        Route::get('/','show_home_page')->name('page.home');
        Route::get('/ulogin','userlogin')->name('user.login');
    }
);
