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
    return view('login.userlogin');
});

Route::controller(ShowPagesController::class)->prefix('admin')->middleware('admin.auth')->group(
    function(){
        Route::get('/dashboard','dashboard_view')->name('dashboard');
        Route::get('/org/dashboard','org_dashboard_view')->name('org_dashboard_view');
        Route::get('/users','show_add_users')->name('users');
        Route::get('/org/add','Show_add_org')->name('addorg');
        Route::get('/org','show_all_orgs')->name('orgs.show');
        Route::get('/org_type','show_org_type')->name('org_type');
        Route::get('/billboards', 'bill_board_view')->name('billboard.add.edit.del');
        // Route::get('/dashboard','showdashboard')->name('admin.dashboard');
        Route::get('/hoods','show_hoods_view')->name('hoods');
        Route::get('/org/show/{id}','getorg');
        Route::get('/office', 'show_office_view')->name('segmanet');
        Route::get('/org/clip/{id}','show_auto_clip')->name('org.autoclipboard');
        Route::get('/logout', 'adminlogout')->name('admin.logout');
        Route::get('/system','System_initialization_view')->name('System.initialization')
    }
);
Route::controller(ShowPagesController::class)->prefix('admin')->middleware('admin.guest')->group(
    function () {

        Route::get('/','adminlogin')->name('adminlogin');
    }
);
// Route::controller(ShowPagesController::class)->middleware('auth')->group(
//     function () {
//         // Route::get('/ulogin', 'userlogin')->name('user.login');
//     }
// );
Route::get('/login', [ShowPagesController::class,'userlogin'])->name('user.login');
// Route::get('/storage/{filename}', function ($filename) {
//     $path = storage_path('app/public/' . $filename);
//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);

//     return $response;
// })->where('filename', '.*');
