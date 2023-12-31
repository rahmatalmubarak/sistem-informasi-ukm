<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arsip_list = Arsip::paginate(10);
        return view('dashboard.arsip.index', compact('arsip_list'));
    }

    public function cari(Request $request)
    {
        $arsip_list = Arsip::where('nama', 'LIKE', '%' . $request->cari . '%')
                    ->paginate(10);
        return view('dashboard.arsip.index', compact('arsip_list'));
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
            'ormawa_id' => 'required',
            'tgl_upload' => 'required',
            'file' => 'required|mimes:docx,doc,pdf,xlsx|max:10000',
        ]);
        $file = $request->file('file');
        $file->storeAs('public/arsip/data/', $file->hashName());
        Arsip::create([
            'nama' => $request->nama,
            'file' => $file->hashName(),
            'ormawa_id' => $request->ormawa_id,
            'tgl_upload' => $request->tgl_upload,
        ]);
        
        return redirect()->route('arsip.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsip = Arsip::find($id);

        return view('dashboard.arsip.detail', compact('arsip'));
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
        $arsip = Arsip::find($id);
        $request->validate([
            'nama' => 'required',
            'ormawa_id' => 'required',
            'tgl_upload' => 'required',
            'file' => 'required|mimes:docx,doc,pdf,xlsx|max:10000',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->storeAs('public/arsip/data/', $file->hashName());

            Storage::delete('public/arsip/data/' . $arsip->file);

            $arsip->update([
                'nama' => $request->nama,
                'file' => $file->hashName(),
                'ormawa_id' => $request->ormawa_id,
                'tgl_upload' => $request->tgl_upload,
            ]);
        } else {
            $arsip->update([
                'nama' => $request->nama,
                'ormawa_id' => $request->ormawa_id,
                'tgl_upload' => $request->tgl_upload,
            ]);
        }

        return redirect()->route('arsip.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsip = Arsip::find($id);
        Storage::delete('public/arsip/data/' . $arsip->file);
        Arsip::destroy($id);
        Alert::success('Berhasil', 'Data berhasil dihapus!');
        return response()->json(['message' => 'success']);
    }

    public function download($id)
    {
        $arsip = Arsip::find($id);
        return Storage::download('public/arsip/data/' . $arsip->file);
    }
}
