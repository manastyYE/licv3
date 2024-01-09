<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClipBoard;
use App\Models\HoodUnit;
use App\Models\Org;
use App\Models\OrgBillboard;
use App\Models\OrgType;
use App\Models\Street;
use App\Models\VirOrgBillboard;
use App\Models\VirOrgs;
use App\Models\Worker;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserDataContoller extends Controller
{
    use GeneralTrait;

    public function get_streets(){
        try{
            $w = Worker::find(Auth::guard('worker-api')->user()->id);
            $Array = json_decode($w->hood_units);
            $street = Street::whereIn('hood_unit_id', $Array)->get();
//            $street = Street::take(5)->get();
            $office_id = Auth::guard('worker-api')->user()->office_id;
            if ($office_id == 4) {//الاشغال
                $org_type = OrgType::all();
            } else {
                $org_type = OrgType::where('office_id',$office_id)->get();
            }

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
            $office_id = Auth::guard('worker-api')->user()->office_id;
            if ($office_id == 4) {//الاشغال
                $orgs = Org::select('id','org_name','license_status','owner_name')->orderBy('created_at', 'desc')->get();
            } else {
                $org_type_ids = OrgType::where('office_id',$office_id)->pluck('id');
                Org::whereIn('org_type_id', $org_type_ids)->select('id','org_name','license_status','owner_name')->orderBy('created_at', 'desc')->get();
            }
            $orgs = Org::select('id','org_name','license_status','owner_name')->orderBy('created_at', 'desc')->get();
            return $this->returnData('data',$orgs);
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    public function get_vir_orgs(){
        try{
            // if(Auth::guard('worker-api')->user()->role_no == 1){
            //     $orgs = VirOrgs::with(['user' => function ($query) {
            //         $query->select('id', 'fullname');
            //     }])->select('id','org_name','owner_name','is_moved','user_id')->get();
            // }
            // else{
            //     $ids = Auth::guard('worker-api')->user()->supervisedWorkers->pluck('id');
            //     $ids->push(Auth::guard('worker-api')->user()->id);
            //     $orgs = VirOrgs::with(['user' => function ($query) {
            //         $query->select('id', 'fullname');
            //     }])->WhereIn('user_id',$ids)->select('id','org_name','owner_name','is_moved','user_id')->get();
            // }
            $orgs = VirOrgs::with(['user' => function ($query) {
                        $query->select('id', 'fullname');
                    }])->select('id','org_name','owner_name','is_moved','user_id')->orderBy('created_at', 'desc')->get();
            $orgs = $orgs->map(function ($org) {
                $org['user_name'] = $org->user->fullname;
                return $org;
            });
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
            // $org->building_type_name = $org->building_type->name;
            $org->street_name = $org->street->name;
            $org->org_type_name = $org->org_type->name;
            $board = OrgBillboard::with('billboard')->where('org_id',$id)->get();
            $org->billboard = $board;
            $clip_board = ClipBoard::where('org_id',$id)->select('el_gate','local_fee','clip_status','clean_pay','total_ad')->latest()->first();
            $org->clip_board = $clip_board;

            return $this->returnData('data',$org);
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function get_billboard(Request $request){

        try {
            $rules = [
                "id" => "required",
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $org = Org::find($request->id);
            $board = OrgBillboard::where('org_id',$org->id)->get();
            $board->type = $board->billboard->name;
            return $this->returnData('data',$board);

        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    // public function get_vir_billboard($id){
    //         $org = VirOrgs::find($id);
    //         $board = VirOrgBillboard::where('vir_org_id',$org->id)->get();
    //         $board->type = $board->billboard->name;
    //         return $board;

    //     }
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
            $org->street_name = $org->street->name;
            $org->org_type_name = $org->org_type->name;
            $board = VirOrgBillboard::with('billboard')->where('vir_org_id',$id)->get();
            $org->billboard = $board;
            return $this->returnData('data',$org);

        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function insert_org_data(Request $request){
        try {
            $hood_unit_id = Street::find($request->street_id)->hood_unit_id;
            $user_id = Auth::guard('worker-api')->user()->id;

            if ($request->org_image) {
                $image = $request->org_image;
                $realImage = base64_decode($image);
                $owner_img_tostore = uniqid() . '.jpg';

                $directory = 'public/uploads/orgs/';
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true); // create the directory if it doesn't exist
                }

                $full_path = $directory . 'owner_img ' . $owner_img_tostore;
                $file_put = file_put_contents($full_path, $realImage);

                $request->merge([
                    'user_id' => $user_id,
                    'hood_unit_id' => $hood_unit_id,
                    'org_image' => $full_path,
                ]);
            } else {
                $request->merge([
                    'user_id' => $user_id,
                    'hood_unit_id' => $hood_unit_id,
                ]);
            }

            VirOrgs::create($request->all());

            if (isset($file_put) && $file_put === false) {
                return response()->json([
                    'success' => false,
                    'msg' => "File uploading error",
                    'path' => ""
                ]);
            }

            return $this->returnSuccessMessage('success');
        } catch (\Exception $ex) {
            Log::error($ex);
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }

    public function get_hood_units(){
        $hood_units = HoodUnit::with(['street'])->get();
        return $this->returnData('data',$hood_units);
    }

    public function insert_billboard(Request $request){
        try{
            if ( Auth::guard('worker-api')->user()->office_id != 4) {
                return $this->returnError("E001","لا تمتلك الصلاحية");
            }
            $rules = [
                'vir_org_id' => 'required',
                'billboard_id' => 'required',
                'height' => 'required',
                'width'=>'required',
                'count'=>'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $org = VirOrgs::find($request->vir_org_id);
            if (Auth::guard('worker-api')->user()->id != $org->user_id) {
                return $this->returnError("E000","لا تمتلك الصلاحية");
            }

            $orgbillboard = new VirOrgBillboard();
            $orgbillboard->vir_org_id = $request->vir_org_id;
            $orgbillboard->billboard_id = $request->billboard_id;
            $orgbillboard->height = $request->height;
            $orgbillboard->width = $request->width;
            $orgbillboard->count = $request->count;
            $orgbillboard->save();

            return $this->returnSuccessMessage("تمت الاضافة");
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    public function insert_iamge(Request $request){
        try{
            if ( Auth::guard('worker-api')->user()->office_id != 4) {
                return $this->returnError("E001","لا تمتلك الصلاحية");
            }
            $rules = [
                'vir_org_id' => 'required',
                'org_iamge' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $org = VirOrgs::find($request->vir_org_id);
            if (Auth::guard('worker-api')->user()->id != $org->user_id) {
                return $this->returnError("E000","لا تمتلك الصلاحية");
            }

                $image = $request->org_image;
                $realImage = base64_decode($image);
                $owner_img_tostore = uniqid() . '.jpg';

                $directory = 'public/uploads/orgs/';
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true); // create the directory if it doesn't exist
                }

                $full_path = $directory . 'owner_img ' . $owner_img_tostore;
                $file_put = file_put_contents($full_path, $realImage);
                if (isset($file_put) && $file_put === false) {
                    return response()->json([
                        'success' => false,
                        'msg' => "File uploading error",
                        'path' => ""
                    ]);
                }

                $org->org_image = $full_path;
                $org->save();

            return $this->returnSuccessMessage("تمت الاضافة");
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
