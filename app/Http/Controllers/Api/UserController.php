<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::get();
            return response()->json([
                'message' => 'Here you got',
                'data' => $users
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something Wrong',
                'data' => null
            ], 400);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $message =[

            ];

            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:15',
                'email' => 'required|email',
                'password' => 'required|string|min:8'
            ], $message);
    
            if($validate->fails()){
                $this->data['message'] = 'error';
                $this->data['error'] = $validate->errors();
                return $this->data;
            }

            $users = new User;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = bcrypt('password');
            $users->save();
            $memberRole = Role::where('name', 'member')->first();
            $users->attachRole($memberRole);
            return response()->json([
                'message' => 'Success Add',
                'data' => $users
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something Wrong',
                'data' => null
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $message =[

            ];

            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:15',
                'email' => 'required|email',
                'password' => 'required|string|min:8'
            ], $message);
    
            if($validate->fails()){
                $this->data['message'] = 'error';
                $this->data['error'] = $validate->errors();
                return $this->data;
            }

            $users = User::find($id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = bcrypt('password');
            $users->save();
            return response()->json([
                'message' => 'Success Edit',
                'data' => $users
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something Wrong',
                'data' => null
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $users = User::find($id);
            $users ->delete();
            return response()->json([
                'message' => 'Success Delete',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something Wrong',
            ], 400);
        }
    }
}
