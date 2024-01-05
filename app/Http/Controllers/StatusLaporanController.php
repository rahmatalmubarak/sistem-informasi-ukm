<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\StatusLaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StatusLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_list = Laporan::paginate(10);
        return view('dashboard.status_laporan.index', compact('laporan_list'));
    }

    public function cari(Request $request)
    {
        $laporan_list = Laporan::where('judul', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        return view('dashboard.status_laporan.index', compact('laporan_list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status_laporan = StatusLaporan::where('laporan_id', $id)->first();
        return response()->json($status_laporan);
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

        return view('dashboard.status_laporan.edit', compact('laporan'));
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
        $status_laporan = StatusLaporan::where('laporan_id',$id)->first();
        if(!isset($request->konfirmasi)){
            Storage::delete('public/sk/data/' . $status_laporan->sk);
            $status_laporan->update([
                'sk' => '',
                'konfirmasi' => false,
                'catatan' => $request->catatan
            ]);
        }else{
            $request->validate([
                'sk' => 'required|mimes:docx,doc,pdf,xlsx|max:10000'
            ]);
            $sk = $request->file('sk');
            $sk->storeAs('public/sk/data/', $sk->hashName());
            $status_laporan->update([
                'sk' => $sk->hashName(),
                'konfirmasi' => 1,
                'catatan' => $request->catatan
            ]);
        }
        Alert::success('Berhasil', 'SK berhasil di upload!');
        return redirect()->route('status_laporan.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function download($id)
    {
        $statusLaporan = StatusLaporan::find($id);
        return Storage::download('public/sk/data/' . $statusLaporan->sk);
    }

    public function updateCatatan(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required'
        ]);

        $status_laporan = StatusLaporan::find($id);
        
        $status_laporan->update([
            'catatan' => $request->catatan
        ]);
        Alert::success('Berhasil', 'Catatan Berhasil Ditambahkan!');
        return redirect()->route('status_laporan.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function updateSK(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:docx,doc,pdf,xlsx|max:10000'
        ]);

        $status_laporan = StatusLaporan::find($id);
        Storage::delete('public/sk/data/' . $status_laporan->sk);

        $sk = $request->file('file');
        $sk->storeAs('public/sk/data/', $sk->hashName());

        $status_laporan->update([
            'sk' => $sk->hashName()
        ]);
        return redirect()->route('status_laporan.index')->with(['success' => 'Data Berhasil Ditambahkan!']);

    }

    public function updateStatus(Request $request, $id)
    {
        $status_laporan = StatusLaporan::find($id);
        $isAktif = 0;
        if($status_laporan->status == 2 || $status_laporan->status == 0){
            Alert::success('Berhasil', 'Laporan Disetujui!');
            $isAktif = 1;
        }else{
            $isAktif = 2;
            Alert::success('Berhasil', 'Laporan Ditolak!');
        }
        $status_laporan->update([
            'status' => $isAktif
        ]);
        return redirect()->route('status_laporan.index')->with(['success' => 'Data Berhasil Ditambahkan!']);

    }
}
