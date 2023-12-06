<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HoodUnit;
use App\Models\Org;
use App\Models\OrgType;
use App\Models\Street;
use App\Models\VirOrgBillboard;
use App\Models\VirOrgs;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserDataContoller extends Controller
{
    use GeneralTrait;

    public function get_streets(){
        try{
        $street = Street::take(5)->get();
        $org_type = OrgType::all();
        return response()->json([
            'success' => true,
            'errNum' => "S000",
            'msg' => "",
            'data' => $street,
            'org_type' => $org_type,
        ]);
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    public function get_orgs(){
        try{
        $orgs = Org::select('id','org_name')->get();
        return $this->returnData('data',$orgs);
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    public function get_vir_orgs(){
        try{
        $orgs = VirOrgs::where('user_id',Auth::guard('api')->user()->id)->select('id','org_name')->get();
        return $this->returnData('data',$orgs);
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    public function user_get_org(Request $request){

        try {
            $rules = [
                "id" => "required",
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $id = $request->id;
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

    public function user_get_vir_org(Request $request){

        try {
            $rules = [
                "id" => "required",
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $id = $request->id;
            $org = VirOrgs::find($id);
            $org->building_type_name = $org->building_type->name;
            $org->street_name = $org->street->name;
            $org->org_type_name = $org->org_type->name;
            return $this->returnData('data',$org);

        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function insert_org_data(Request $request){
        try {
            $rules = [
                "org_name" => "required",
                "owner_name" => "required",
                "owner_phone" => "required",
                "building_type_id" => "required",
                "org_type_id" => "required",
                "hood_unit_id" => "required",
                "street_id" => "required",
                "note" => "required",
                "log_x" => "required",
                "log_y" => "required",
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $hood_unit_id = Street::find($request->street_id)->hood_unit_id;
            $request->merge(['user_id' => Auth::guard('api')->user()->id,
            'hood_unit_id' => $hood_unit_id]);
            $requestData = $request->except('org_image');
            VirOrgs::create($requestData);
            return $this->returnSuccessMessage('success');
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function get_hood_units(){
        $hood_units = HoodUnit::with(['street'])->get();
        return $this->returnData('data',$hood_units);
    }

    public function insert_billboard(Request $request){
        try{
            $rules = [
                'vir_org_id' => 'required',
                'billboard_id' => 'required',
                'height' => 'required',
                'wideth'=>'required',
                'count'=>'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $org = VirOrgs::find($request->billboard_id);
            if (Auth::guard('api')->user()->id != $org->user_id) {
                return $this->returnError("E000","لا تمتلك الصلاحية");
            }

            //Add Student Data
            $orgbillboard = new VirOrgBillboard();
            $orgbillboard->vir_org_id = $request->vir_org_id;
            $orgbillboard->billboard_id = $request->billboard_id;
            $orgbillboard->height = $request->height;
            $orgbillboard->width = $request->wideth;
            $orgbillboard->count = $request->count;
            $orgbillboard->save();
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
