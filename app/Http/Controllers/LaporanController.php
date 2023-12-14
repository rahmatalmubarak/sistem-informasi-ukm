<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\StatusLaporan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
            $request->validate([
                'ormawa_id' => 'required',
                'file' => 'required|mimes:docx,doc,pdf,xlsx|max:10000',
            ]);
            $file = $request->file('file');
            $fileName = explode('.', $file->getClientOriginalName())[0];
            $file->storeAs('public/file/data/', $file->hashName());
            Laporan::create([
                'judul' => $fileName,
                'file' => $file->hashName(),
                'ormawa_id' => $request->ormawa_id,
            ]);

            $data = Laporan::latest('created_at')->first();
            StatusLaporan::create([
                'laporan_id' => $data->id,
                'status' => 0
            ]);
            // DB::commit();
            Alert::success('Berhasil', 'Data Berhasil Disimpan!');
            return redirect()->route('laporan.index');
        } catch (Exception $th) {
            // DB::rollBack();
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

        return response()->json($laporan);
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

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:docx,doc,pdf,xlsx|max:10000',
            ]);
            $file = $request->file('file');
            $fileName = explode('.', $file->getClientOriginalName())[0];
            $file->storeAs('public/file/data/', $file->hashName());

            Storage::delete('public/file/data/' . $laporan->file);

            $laporan->update([
                'judul' => $fileName,
                'file' => $file->hashName(),
            ]);
        }
        Alert::success('Berhasil', 'Data Berhasil Diubah!');
        return redirect()->route('laporan.index');
        
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
        Alert::success('Berhasil', 'Data Berhasil Dihapus!');
        return redirect()->route('laporan.index');
    }

    public function download($id)
    {
        $laporan = Laporan::find($id);
        return Storage::download('public/file/data/' . $laporan->file);
    }

    public function updateStatus(Request $request, $id){
        $laporan = Laporan::find($id);

    }
}
