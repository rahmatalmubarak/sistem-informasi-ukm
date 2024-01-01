<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list = User::paginate(10);
        $ormawa_list = Ormawa::all();

        return view('dashboard.user.index', compact(['user_list', 'ormawa_list']));
    }

    public function cari(Request $request)
    {
        $user_list = User::where('username', 'LIKE', '%' . $request->cari . '%')
                        ->where('email', 'LIKE', '%' . $request->cari . '%')    
                        ->paginate(10);
        $ormawa_list = Ormawa::all();
        return view('dashboard.user.index', compact(['user_list', 'ormawa_list']));
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
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'ormawa_id' => $request->ormawa_id,
        ]);

        Alert::success('Sukses', 'User berhasil ditambahkan');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user = [
            'user' => $user,
            'role' => $user->role->nama
        ];
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.user.edit', compact('user'));
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
        $user = User::find($id);
        $request->validate([
                'username' => 'required',
                'email' => 'required',
                'role_id' => 'required',
        ]);

        // cek apakah password juga diganti 
        if ($request->password == null) {
            $request->password = $user->password;
        } else {
            $request->password = Hash::make($request->password);
        }
        
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->ormawa_id = $request->ormawa_id;
        $user->save();

        Alert::success('Sukses', 'User berhasil diubah');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Alert::success('Sukses', 'User berhasil dihapus');
        return response()->json(['message' => 'success']);
    }
}
