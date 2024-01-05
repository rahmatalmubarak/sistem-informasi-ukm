<?php

namespace App\Http\Controllers;

use App\Models\InformasiOrmawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InformasiOrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informasi = InformasiOrmawa::find($id);
        return response()->json([
            'status' => 200,
            'informasi' => $informasi
        ]);
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
            'dasar_hukum' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'proker' => 'required',
            'informasi' => 'required',
        ]);

        $informasi = InformasiOrmawa::find($id);

        if($informasi){
            if($request->hasFile('foto_pengurus')){
                $foto = $request->file('foto_pengurus');
                $foto->storeAs('public/img/data/', $foto->hashName());
                Storage::delete('public/img/data/' . $informasi->foto_pengurus);
                $request->foto_pengurus = $foto->hashName();
            }else{
                $request->foto_pengurus = $informasi->foto_pengurus;
            }
            $informasi->update([
                'dasar_hukum' => $request->dasar_hukum,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'informasi' => $request->informasi,
                'proker' => $request->proker,
                'foto_pengurus' => $request->foto_pengurus,
            ]);
            Alert::success('Berhasil', 'Data Berhasil Diubah!');
        }else{
            InformasiOrmawa::create($request->all());
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan!');
        }
        return redirect()->back();
    }
}
