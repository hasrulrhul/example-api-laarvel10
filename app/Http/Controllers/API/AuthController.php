<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function _error($e)
    {
        $this->response = [
            'message' => $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine()
        ];
        return view('errors.message', ['message' => $this->response]);
    }

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
            return response()->json(["message" => "login successfull", "data" => $data]);
        } else {
            return response()->json(["message" => "login failed"]);
        }
    }

    public function register(Request $request)
    {
        try {
            $model = $request->all();
            $model['password'] = Hash::make($model['password']);
            $data = User::create($model);
            if ($data) {
                return response()->json(["message" => "register successfull", "data" => $data]);
            } else {
                return response()->json(["message" => "register failed"]);
            }
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($this->response);
        }
    }

    public function logout()
    {
        try {
            $user = Auth::user()->token();
            $user->revoke();
            return response()->json("successfull logged out");
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($this->response);
        }
    }

    public function detail()
    {
        try {
            $user = Auth::user();
            return response()->json(["data" => $user]);
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($this->response);
        }
    }
}
