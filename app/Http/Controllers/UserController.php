<?php

namespace App\Http\Controllers;

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
        $users = User::get();
        return view ('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $password = bcrypt($password);

        $request->validate([
            'name' => 'required|string|max:15',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        $users = new User;
        $users->name = $name;
        $users->email = $email;
        $users->password = $password;
        $users->save();
        $memberRole = Role::where('name', 'member')->first();
        $users->attachRole($memberRole);
        return redirect('admin/users')->with('status', 'Sucessfully Added');
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
        $users = User::find($id);
        return view('admin.user.edit')->with('users',$users);
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
        $request->validate([
            'name' => 'required|string|max:15',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt('password');
        $users->save();
        $memberRole = Role::where('name', 'member')->first();
        $users->attachRole($memberRole);
        return redirect ('/admin/users')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/admin/users')->with('status', 'Data berhasil dihapus!');
    }
}
