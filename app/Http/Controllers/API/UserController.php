<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\Repositories\Contracts\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $repo;

    public function __construct(UserContract $repo)
    {
        // $this->title = 'users';
        $this->repo = $repo;
        // $this->middleware("roles:{$this->title}");
    }


    public function _error($e)
    {
        $this->response = [
            'message' => $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine()
        ];
        return view('errors.message', ['message' => $this->response]);
    }

    public function index(Request $r)
    {
        try {
            $data = $this->repo->paginated($r->all());
            return response()->json([
                "message" => "list of users",
                "data"       => $data,
            ]);
        } catch (\Exception $e) {
            $this->response['message'] = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($this->response);
        }
    }

    public function store(Request $request)
    {
        try {
            $req = $request->all();
            $req['password'] = Hash::make($req['password']);
            $this->repo->store($req);
            return response()->json([
                "message" => "users successfully created",
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($message);
        }
    }

    public function show($id)
    {
        try {
            $data = $this->repo->find($id);
            return response()->json([
                "message" => "detail of users",
                "data"       => $data,
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($message);
        }
    }

    public function update(Request $r)
    {
        try {
            $req = $r->all();
            if (isset($req['password']) && $req['password'] != "") {
                $req['password'] = Hash::make($req['password']);
                // } else {
                //     $req['warga_negara'] = $req['asal_negara'];
            }
            $this->repo->update($req, $r->id);
            return response()->json([
                "message" => "users successfully updated",
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($message);
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->repo->delete($id);
            return response()->json([
                "message" => "users successfully deleted",
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage() . ' in file :' . $e->getFile() . ' line: ' . $e->getLine();
            return response()->json($message);
        }
    }
}
