<?php

namespace App\Http\Controllers;

use App\Models\Org;
use App\Models\Street;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use GeneralTrait;

    public function get_streets(){
        $street = Street::all();
        return $this->returnData('data',$street);
    }
    public function get_orgs(){
        $orgs = Org::all();
        return $this->returnData('data',$orgs);
    }
    public function get_org(){
        $org = Org::with(['org_type','street','building_type'])->first();
        return $this->returnData('data',$org);
    }

}
