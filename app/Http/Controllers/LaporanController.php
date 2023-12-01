<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\StatusLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_list = Laporan::paginate(10);
        return view('dashboard.laporan.index', compact('laporan_list'));
    }

    public function cari(Request $request)
    {
        $laporan_list = Laporan::where('judul', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        return view('dashboard.laporan.index', compact('laporan_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.laporan.create');
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
            DB::transaction();
            $request->validate([
                'judul' => 'required',
                'file' => 'required|mimes:docx,doc,pdf,xlsx|max:10000',
            ]);
            $file = $request->file('file');
            $file->storeAs('public/img/data/', $file->hashName());
            Laporan::create([
                'judul' => $request->judul,
                'file' => $file->hashName(),
                'deskripsi' => $request->deskripsi,
            ]);

            $data = Laporan::latest('created_at')->first();
            StatusLaporan::create([
                'laporan_id' => $data->id,
                'konfirmasi' => 0
            ]);
            DB::commit();
            return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('laporan.create');
            //throw $th;
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
        $laporan = Laporan::find($id);

        return view('dashboard.laporan.detail', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = Laporan::find($id);

        return view('dashboard.laporan.edit', compact('laporan'));
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
        $laporan = Laporan::find($id);
        $request->validate([
            'judul' => 'required',
            'file' => 'mimes:docx,doc,pdf,xlsx|max:10000',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->storeAs('public/file/data/', $file->hashName());

            Storage::delete('public/file/data/' . $laporan->file);

            $laporan->update([
                'nama' => $request->nama,
                'file' => $file->hashName(),
                'deskripsi' => $request->deskripsi
            ]);
        } else {
            $laporan->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi
            ]);
        }

        return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::find($id);
        Storage::delete('public/file/data/' . $laporan->file);
        Laporan::destroy($id);
        return redirect()->route('laporan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function download($id)
    {
        $laporan = Laporan::find($id);
        return Storage::download('public/file/data/' . $laporan->file);
    }


}
