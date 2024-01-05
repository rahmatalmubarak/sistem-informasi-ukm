<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return redirect()->route('dashboard');
        }
        return view('dashboard.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if(Auth::user()->role->id != $request->role_id){
                Auth::logout();
                if($request->role_id == '1' ){
                    Alert::error('Gagal', 'Role kamu bukan Super Admin');
                }else{
                    Alert::error('Gagal', 'Role kamu bukan Admin');
                }
                return redirect()->route('auth.login');
            }
            $request->session()->regenerate();
            Alert::success('Berhasil', 'Login berhasil sebagai '. Auth::user()->role->nama);
            return redirect()->route('dashboard');
        }

        Alert::error('Gagal', 'Username dan password salah!');

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
}
