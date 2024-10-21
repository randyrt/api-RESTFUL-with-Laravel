<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\UserRegisterRequest;

class UserController extends Controller
{
    /**
     * Summary of register
     * @param \App\Http\Requests\Api\UserRegisterRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function register(UserRegisterRequest $request){

       try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); ;
            $user->save();

            return response()->json([
                'status_code' => '200',
                'success' => true,
                'status_message' => 'user add with success',
                'data' => $user
            ]);

       }catch(Exception $error){
            return response()->json($error);
       }
    }

    /**
     * Summary of login
     * @param \App\Http\Requests\Api\LoginUserRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function login(LoginUserRequest $request)
    {
        if(Auth::attempt($request->only(['email', 'password']))){
            $user = Auth::user();
            $token = $user->createToken('SECURITY_API_KEY')->plainTextToken;

             return response()->json([
                'status_code' => '200',
                'success' => true,
                'status_message' => 'Operation completed successfully !',
                'token' => $token
            ]);

        }else {
             return response()->json([
                'status_code' => '403',
                'success' => false,
                'status_message' => 'email not valide',
            ]);
        }
    }

}
