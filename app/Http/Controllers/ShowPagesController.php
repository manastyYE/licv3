<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ShowPagesController extends Controller
{
    //
    public function show_add_org(){
        return view('orgs.add_org');
    }
    public function show_add_users(){
        return view('add_users');
        
    }
    public function show_org_type(){
        return view('t22est');
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
        return redirect()->route('admin.login');
    }
    public function userlogout(){
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }
    public function show_hoods_view(){
        return view('hoods');
    }
    public function show_all_orgs(){
        return view('orgs.show_orgs');
    } 
    public function getorg($id){
        return view('orgs.show_org_dtl',['id'=>$id]);
    }
}
