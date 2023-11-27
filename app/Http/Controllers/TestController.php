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
        $street = Street::get();
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized',
            'data' => $street,
        ]);
        // $this->returnData('data',$street);
    }
    public function get_orgs(){
        $orgs = Org::all();
        $this->returnData('data',$orgs);
    }
    public function get_org(){
        $org = Org::first();
        $this->returnData('data',$org);
    }

}
