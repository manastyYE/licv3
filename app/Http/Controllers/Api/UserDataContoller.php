<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Org;
use App\Models\Street;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDataContoller extends Controller
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
    public function get_org($id){

        try {
        //     $rules = [
        //         "id" => "required",
        //     ];

            // $validator = Validator::make($request->all(), $rules);

            // if ($validator->fails()) {
            //     $code = $this->returnCodeAccordingToInput($validator);
            //     return $this->returnValidationError($code, $validator);
            // }
            // $id = $request->id;
            $org = Org::find($id);
            $org->building_type_name = $org->building_type->name;
            $org->street_name = $org->street->name;
            $org->org_type_name = $org->org_type->name;
            return $this->returnData('data',$org);

        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
