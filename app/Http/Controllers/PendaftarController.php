<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pendaftar_list = User::paginate(10);
        return view('dashboard.pendaftar.index', compact('pendaftar_list'));
    }

    public function cari(Request $request)
    {
        $pendaftar_list = User::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        return view('dashboard.pendaftar.index', compact('pendaftar_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pendaftar.create');
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
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            're_password' => 'required',
        ]);
        if($request->password != $request->re_password){
            Validator::make($request->all(), [
                're_password' => 'required',
            ],
            [
                're_password' => 'Password tidak sama.'
            ]);
        }
        User::create([
            'foto' => '',
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'jenis_kelamin' => '',
            'role_id' => 3
        ]);

        $user = User::where('email', $request->email)->first();
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('pendaftar.edit', ['id'=> $user->id])->with(['success' => 'Data Berhasil Disimpan!']);
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
        $pendaftar = User::find($id);

        return view('dashboard.pendaftar.detail', compact('pendaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendaftar = User::find($id);

        return view('dashboard.pendaftar.edit', compact('pendaftar'));
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
        $pendaftar = User::find($id);
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'foto' => 'image|mimes:png,jpg,svg,jpeg"max:2084',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required',
            'konfirmasi' => 'required',
        ]);

        // cek apakah password juga diganti 
        if ($request->password == null) {
            $request->password = $pendaftar->password;
        } else {
            $request->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/img/pendaftar/', $image->hashName());

            Storage::delete('public/img/pendaftar/' . $pendaftar->foto);

            $pendaftar->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'foto' => $image->hashName(),
                'password' => $request->password,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'fakultas' => $request->fakultas,
                'jurusan' => $request->jurusan,
                'konfirmasi' => $request->konfirmasi,
            ]);
        } else {
            $pendaftar->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'fakultas' => $request->fakultas,
                'jurusan' => $request->jurusan,
                'konfirmasi' => $request->konfirmasi,
            ]);
        }

        return redirect()->route('pendaftar.finish')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftar = User::find($id);
        Storage::delete('public/img/pendaftar/' . $pendaftar->foto);
        User::destroy($id);
        return redirect()->route('pendaftar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
