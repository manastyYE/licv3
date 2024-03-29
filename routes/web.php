<?php

use App\Http\Controllers\ReportPDFContoller;
use App\Http\Controllers\ShowPagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowOrgDtl;

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
    return view('pdf');
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
        Route::get('/system','System_initialization_view')->name('System.initialization');
        Route::get('/streets', 'show_streets')->name('streets');
        Route::get('/hood_unit', 'show_hood_unit')->name('hood_unit');
        Route::get('/vir_orgs','show_vir_orgs')->name('vir_orgs.show');
        Route::get('/vir_orgs/show/{id}','get_vir_orgs');
        Route::get('/outher/pay','show_outher_pay')->name('outher.pay');
        Route::get('/workers','show_workers_view')->name('workers.show');
        Route::get('/vir-to-orgs/{id}','show_add_vir_to_org');
        Route::get('/building','show_buildings_view')->name('show_buildings_view');
        Route::get('/org/outherclip/{id}','outherclip')->name('org.outherclip');
        Route::get('/myaccount/personal','showMyAccount')->name('admin.account.stting');
        // Route::get('/myaccount/password','changePassword')->name('admin.account.stting');
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

//     return $response;rt/
// })->where('filename', '.*');
Route::controller(ReportPDFContoller::class)->prefix('admin/report/works')->middleware('admin.auth')->group(
    function(){
        Route::get('/','mainReport');
        Route::get('/orgs','showOrgReportView');
        Route::get('orgs-date','show_org_date_view');
        Route::get('clip/{id}','printClip')->name('reporn.printClip');
        Route::get('card/{id}','printCard');
        Route::get('outherclip/{id}','outherClip');
        Route::get('clips/all','getAllclip');
        Route::get('clips/pay','getPayedclip');
        Route::get('clips/npay','getNPayedclip');
        Route::get('orgs-date/{data}','show_dayly_report');
        Route::get('orgs-date-between/{from_date}/{to_date}','showFromDateToDate');

    }
);
Route::controller(ReportPDFContoller::class)->prefix('admin/report/health')->middleware('admin.auth')->group(
    function(){
        Route::get('/','mainHealthReportView')->name('report.health.main');
        Route::get('/all-health-orgs','allHealthOrgs')->name('report.health.orgs');
        Route::get('/health-clips','showAllHealthClips')->name('report.halth.allclips');

    }
);
Route::controller(ReportPDFContoller::class)->prefix('admin/report/tourism')->middleware('admin.auth')->group(
    function(){
        Route::get('/','mainTourismReportView')->name('report.tourism.main');
        Route::get('/all-tourism-orgs','allTourismOrgs')->name('report.tourism.orgs');
        Route::get('/tourism-clips','showAllTourismClips')->name('report.tourism.allclips');

    }
);
Route::controller(ReportPDFContoller::class)->prefix('admin/report/culture')->middleware('admin.auth')->group(
    function(){
        Route::get('/','maiClutureReportView')->name('report.cluture.main');
        Route::get('/all-cluture-orgs','allClutureOrgs')->name('report.cluture.orgs');
        Route::get('/cluture-clips','showAllCultureClips')->name('report.cluture.allclips');

    }
);
Route::controller(ReportPDFContoller::class)->prefix('admin/report')->middleware('admin.auth')->group(
    function (){
        Route::get('/','allReport')->name('report.office.all');
    }
);

