<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $data = [
                'token' => $success['token'],
                'data' => [
                    'email' => $user->email,
                    'name' => $user->name
                ],
            ];
            return response()->json(["code" => 200, "message" => "login successfull", "data" => $data]);
        } else {
            return response()->json(["code" => 404, "message" => "user not found"]);
        }
    }

    public function register(Request $request)
    {
        try {
            $model = $request->all();
            $model['password'] = Hash::make($model['password']);
            $data = User::create($model);
            if ($data) {
                return response()->json(["code" => 201, "message" => "register successfull", "data" => $data]);
            } else {
                return response()->json(["code" => 422, "message" => "register failed"]);
            }
        } catch (\Exception $e) {
            return response()->json(["code" => 500, "message" => "errors"]);
        }
    }

    public function logout()
    {
        try {
            $user = Auth::user()->token();
            $user->revoke();
            return response()->json("successfull logged out");
        } catch (\Exception $e) {
            return response()->json("error");
        }
    }

    public function detail()
    {
        try {
            $user = Auth::user();
            return response()->json(["code" => 200, "data" => $user]);
        } catch (\Exception $e) {
            return response()->json("error");
        }
    }
}
