<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    use GeneralTrait;

    public function __construct()
    {
        // $this->middleware('auth.guard:worker_api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
        try{
            $rules = [
                "phone" => "required",
                "password" => "required"
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $credentials = $request->only(['phone', 'password']);

            $token = Auth::guard('worker-api')->attempt($credentials);
            if (!$token)
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');

            $aqel = Auth::guard('worker-api')->user();
            $aqel->api_token = $token;
            //return token
            return $this->returnData('data', $aqel);

//             if( User::where('phone',$request->phone)->where('password',$request->password)->count() > 0 ){
//
//                 $user = User::where('phone', $request->phone)->where('password', $request->password)->get()->first();
//                 $output = [
//                     "success"=>true,
//                     "token"=>$user->createToken($user->phone)->plainTextToken ,
//                     "type"=>"Bearer",
//                     "msg"=>"FOUND"
//                     ];
//             }
//             else {
//                 $output = [
//                     "success" => false,
//                     "msg" => "NOT FOUND",
//                 ];
//             }
//             return $output ;
                    }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }

    public function logout(Request $request)
    {
        $token = $request -> header('auth-token');
        if($token){
            try {
                JWTAuth::setToken($token)->invalidate(); //logout
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this -> returnError('','some thing went wrongs');
            }
            return $this->returnSuccessMessage('تم تسجيل الخروج');
        }else{
            $this -> returnError('','حدث خطأ ما');
        }

    }

    public function get_profile()
    {
        try{
            $aqel = Auth::guard('worker-api')->user();
            //return token
            return $this->returnData('data', $aqel);
        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }

    public function reset_password(Request $request){
        try {
            $rules = [
                "old_pass" => "required",
                "new_pass" => "required",
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            if (Hash::check($request->old_pass,Auth::guard('worker-api')->user()->password)) {
                $worker = Worker::find(Auth::guard('worker-api')->user()->id);
                $worker->password = Hash::make($request->new_pass);
                $worker->save();
            } else {
                return $this->returnError("","كلمة المرور القديمة غير صحيحة");
            }

            return $this->returnSuccessMessage('تم تغيير كلمة المرور بنجاح');

        }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

}
