<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;


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
            return [
                        "success"=>true,
                        "token"=>$request->phone,
                        "type"=>"Bearer",
                        "msg"=>"FOUND"
                        ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            $credentials = $request->only(['phone', 'password']);

            $token = Auth::guard('api')->attempt($credentials);

            if (!$token)
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');

            $aqel = Auth::guard('api')->user();
            $aqel->api_token = $token;
            //return token
            return $this->returnData('data', $aqel);
            // if( User::where('phone',$request->phone)->where('password',$request->password)->count() > 0 ){

            //     $user = User::where('phone', $request->phone)->where('password', $request->password)->get()->first();
            //     $output = [
            //         "success"=>true,
            //         "token"=>$user->createToken($user->phone)->plainTextToken ,
            //         "type"=>"Bearer",
            //         "msg"=>"FOUND"
            //         ];
            // }
            // else {
            //     $output = [
            //         "success" => false,
            //         "msg" => "NOT FOUND",
            //     ];
            // }
            // return $output ;
                    }
        catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function me()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
