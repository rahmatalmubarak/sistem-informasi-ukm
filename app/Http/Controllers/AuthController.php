<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        
        // dd(Auth::user()->role->nama == 'admin');
        if(Auth::user()){
            return redirect()->route('dashboard');
        }
        return view('dashboard.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if(Auth::user()->role->nama == 'calon pendaftar'){
                return redirect()->route('pendaftar.edit', ['id' => Auth::user()->id]);
            }
            return redirect()->route('dashboard');
        }
        
        dd($request);

        return back()->withErrors([
            'password' => 'Wrong email or password',
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
