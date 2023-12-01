<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan_list = Kegiatan::paginate(10);
        return view('dashboard.kegiatan.index', compact('kegiatan_list'));
    }

    public function cari(Request $request)
    {
        $kegiatan_list = Kegiatan::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        return view('dashboard.kegiatan.index', compact('kegiatan_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kegiatan.create');
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
            'tgl_kegiatan' => 'required',
        ]);
        Kegiatan::create([
            'nama' => $request->nama,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);

        return view('dashboard.kegiatan.detail', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);

        return view('dashboard.kegiatan.edit', compact('kegiatan'));
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
        $kegiatan = Kegiatan::find($id);
        $request->validate([
            'nama' => 'required',
            'tgl_kegiatan' => 'required',
        ]);

        $kegiatan->update([
            'nama' => $request->nama,
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        Storage::delete('public/img/data/' . $kegiatan->logo);
        Kegiatan::destroy($id);
        return redirect()->route('kegiatan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
