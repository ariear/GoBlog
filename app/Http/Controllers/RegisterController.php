<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register',[
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
        $validasi = $request->validate([
            'name' => 'required',
            'username' => 'required|max:50|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:4'
        ]);

        $validasi['password'] = bcrypt($validasi['password']);

        $user = User::create($validasi);

        Auth::login($user);

        return redirect('/login')->with('success','Registrasi Berhasil , Kuy Login!!');
    }
}
