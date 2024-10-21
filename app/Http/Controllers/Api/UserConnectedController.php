<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;

class UserConnectedController extends Controller
{
        /**
     * Summary of getUserInfo
     * @param \App\Http\Requests\Api\LoginUserRequest $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function getUserInfo(LoginUserRequest $request)
    {
    
        if ($request->user()) {
            $user = $request->user(); 

            return response()->json([
                'status_code' => '200',
                'success' => true,
                'status_message' => 'You\'re connected',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ]);
        } else {
            return response()->json([
                'status_code' => '401',
                'success' => false,
                'status_message' => 'Unauthorized access. Please provide a valid token.',
            ]);
        }
    }
}
