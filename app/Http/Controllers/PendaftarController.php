<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pendaftar_list = Pendaftar::paginate(10);
        return view('dashboard.pendaftar.index', compact('pendaftar_list'));
    }

    public function cari(Request $request)
    {
        $pendaftar_list = Pendaftar::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
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
        try {

            $request->validate([
                'ormawa_id' => 'required',
                'nama' => 'required',
                'email' => 'required',
                'nim' => 'required',
                'kontak' => 'required',
                'kelas' => 'required',
                'kepengurusan_sebelumnya' => 'required',
                'tujuan' => 'required',
                'file_syarat' => 'required',
                'konfirmasi' => 'required',
            ]);



            $file_syarat = $request->file('file_syarat');
            $file_syarat->storeAs('public/file/pendaftar/', $file_syarat->hashName());
        

            Pendaftar::create([
                'ormawa_id' => $request->ormawa_id,
                'nama' => $request->nama,
                'email' => $request->email,
                'nim' => $request->nim,
                'kontak' => $request->kontak,
                'kelas' => $request->kelas,
                'kepengurusan_sebelumnya' => $request->kepengurusan_sebelumnya,
                'tujuan' => $request->tujuan,
                'file_syarat' => $file_syarat->hashName(),
                'konfirmasi' => $request->konfirmasi,
            ]);

            $user = Pendaftar::where('email', $request->email)->first();

            Alert::success('Berhasil', 'Data Berhasil Disimpan!');
            // return redirect()->route('pendaftar.edit', ['id'=> $user->id]);
            return redirect()->route('dashboard');
        } catch (\Throwable $e) {
            dd($e); 
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
        $pendaftar = Pendaftar::find($id);

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
        $pendaftar = Pendaftar::find($id);

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
        $pendaftar = Pendaftar::find($id);
        $request->validate([
            'ormawa_id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'nim' => 'required',
            'kontak' => 'required',
            'kelas' => 'required',
            'kepengurusan_sebelumnya' => 'required',
            'tujuan' => 'required',
            'file_syarat' => 'required',
            'konfirmasi' => 'required',
        ]);
        $pendaftar->update([
            'ormawa_id' => $request->ormawa_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'nim' => $request->nim,
            'kontak' => $request->kontak,
            'kelas' => $request->kelas,
            'kepengurusan_sebelumnya' => $request->kepengurusan_sebelumnya,
            'tujuan' => $request->tujuan,
            'file_syarat' => $file_syarat->hashName(),
            'konfirmasi' => $request->konfirmasi,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Diubah!');

        return redirect()->route('pendaftar.finish');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftar = Pendaftar::find($id);
        Storage::delete('public/img/pendaftar/' . $pendaftar->foto);
        Pendaftar::destroy($id);
        Alert::success('Berhasil', 'Data Berhasil Dihapus!');
        return redirect()->route('pendaftar.index');
    }

    public function download($id){
        $pendaftar = Pendaftar::find($id);
        return Storage::download('public/file/pendaftar/'.$pendaftar->file_syarat);
    }

    public function status(Request $request, $id)
    {
        $pendaftar = Pendaftar::find($id);
        
        $pendaftar->konfirmasi = $request->konfirmasi;
        $pendaftar->save();


        Alert::success('Berhasil', 'Data Berhasil Dikonfirmasi!');
        return redirect()->route('pendaftar.index');
    }
}
