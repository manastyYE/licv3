<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ShowPagesController extends Controller
{
    public function showMyAccount(){
        return view('users.user_personal_info');
    }
    public function changePassword(){
        return view('users.user_password');
    }
    public function show_buildings_view(){
        return view('buildings');
    }
    public function show_add_vir_to_org($id){
        return view('vir_orgs.ConfiremToOrgs',['id'=>$id]);
    }
    public function outherclip($id){
        return view('outher_clip',['id'=>$id]);
    }
    //
    public function show_workers_view(){
        return view('workers');
    }
    public function show_add_org(){
        return view('orgs.add_org');
    }
    public function show_add_users(){
        return view('add_users');

    }
    public function show_org_type(){
        return view('opp_type');
    }
    public function adminlogin(){
        // Admin::create([
        //     'fullname'=>'abdullah alhammadi',
        //     'phone'=>'774490160',
        //     'username'=>'admin',
        //     'password'=>bcrypt('admin'),
        //     'directorate_id'=>1,
        // ]);
        return view('login.login');
    }
    public function userlogin(){
        // User::create([
            // 'fullname'=>'abdullah alhammadi',
            // 'phone'=>'774490160',
            // 'username'=>'alhammadi',
            // 'password'=>bcrypt('abdullah'),
            // 'directorate_id'=>1,
            // 'roll'=>1,
        // ]);
        return view('login.userlogin');
    }
    public function showdashboard(){
        return view('welcome');
    }
    public function userdashboard(){
        return view('welcome');
    }
    public function adminlogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('adminlogin');
    }
    public function userlogout(){
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }
    public function show_hoods_view(){
        return view('hoods');
    }
    public function show_hood_unit(){
        return view('hood_units');
    }
    public function show_all_orgs(){
        return view('orgs.show_orgs');
    }
    public function getorg($id){
        return view('orgs.show_org_dtl',['id'=>$id]);
    }
    public function bill_board_view(){
        return view('bill_booard');
    }
    public function dashboard_view(){
        return view('dashboard.admin.main');
    }
    public function org_dashboard_view(){
        return view('dashboard.admin.main_org');
    }
    public function show_home_page(){
        return view('welcome');
    }
    public function show_office_view()
    {
        return view('office');
    }
    public function show_auto_clip($id){
        return view('Automated_clipboard',['id'=>$id]);
    }
    public function System_initialization_view(){
        return view('dashboard.admin.System_initialization');
    }
    public function show_streets(){
        return view('street');
    }
    public function show_vir_orgs(){
        return view('vir_orgs.show_orgs');
    }
    public function get_vir_orgs($id){
        return view('vir_orgs.show_org_dtl',['id'=>$id]);
    }
    public function show_outher_pay(){
        return view('other_payment');
    }
}
