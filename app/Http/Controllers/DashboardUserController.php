<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index',[
            'users' => User::where('isAdmin', false)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|max:30|unique:users',
            'email' => 'required|email:dns',
            'password' => 'required|min:4'
        ]);

        $validasi['password'] = bcrypt($validasi['password']);
        if ($request->isAdmin) {
            $validasi['isAdmin'] = true;
        }

        User::create($validasi);

        return redirect('/dashboard/users')->with('success','Penambahan User Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:50',
            'email' => 'required|email:dns',
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|max:30|unique:users';
        }

        $validatedData = $request->validate($rules);

        if ($request['username'] == $user->username) {
            $validatedData['username'] = $request->username;
        }
        if ($request->isAdmin) {
            $validatedData['isAdmin'] = true;
        }

        $user->update($validatedData);

        return redirect('/dashboard/users')->with('success','Penambahan User Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/dashboard/users')->with('success','User berhasil di hapus');
    }
}
