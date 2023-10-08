<?php

namespace App\Http\Controllers;

use App\Models\Org;
use App\Models\Street;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function get_streets(){
        $street = Street::all();
        return response($street);
    }
    public function get_orgs(){
        $orgs = Org::all();
        return response($orgs);
    }
    public function get_org(){
        $org = Org::first();
        return response($org);
    }

}
