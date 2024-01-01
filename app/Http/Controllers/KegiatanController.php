<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ormawa_list = Ormawa::paginate(10);
        return view('dashboard.kegiatan.index', compact('ormawa_list'));
    }

    public function cariOrmawa(Request $request)
    {
        $ormawa_list = Ormawa::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        return view('dashboard.kegiatan.index', compact('ormawa_list'));
    }

    public function cariKegiatan(Request $request)
    {
        $ormawa = Ormawa::find($request->ormawa_id);
        if(Auth::user()->role->id == 1){
            $kegiatan_list = Kegiatan::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        }else{
            $kegiatan_list = Kegiatan::where('ormawa_id', Auth::user()->ormawa->id)
                            ->where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        }
        return view('dashboard.kegiatan.detail', compact('kegiatan_list','ormawa'));
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
            'ormawa_id' => 'required',
            'penanggung_jawab' => 'required',
            'jenis' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'tempat' => 'required'
        ]);
        Kegiatan::create([
            'nama' => $request->nama,
            'ormawa_id' => $request->ormawa_id,
            'penanggung_jawab' => $request->penanggung_jawab,
            'jenis' => $request->jenis,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'tempat' => $request->tempat
        ]);
        Alert::success('Berhasil', 'Data Berhasil Disimpan!');
        return redirect()->route('kegiatan.ormawa.kegiatan', ['id' => $request->ormawa_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kegiatan($id)
    {
        $ormawa = Ormawa::find($id);
        if(Auth::user()->role->id == 1){
            $kegiatan_list = Kegiatan::where('ormawa_id',$id)->paginate(10);
        }else{
            $kegiatan_list = Kegiatan::where('ormawa_id', Auth::user()->ormawa->id)
                            ->where('ormawa_id',$id)->paginate(10);
        }
        return view('dashboard.kegiatan.detail', compact('ormawa','kegiatan_list'));
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
            'ormawa_id' => 'required',
            'penanggung_jawab' => 'required',
            'jenis' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'tempat' => 'required'
        ]);

        $kegiatan->update([
            'nama' => $request->nama,
            'ormawa_id' => $request->ormawa_id,
            'penanggung_jawab' => $request->penanggung_jawab,
            'jenis' => $request->jenis,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'tempat' => $request->tempat
        ]);

        Alert::success('Berhasil', 'Data Berhasil Diubah!');

        return redirect()->route('kegiatan.ormawa.kegiatan', ['id' => $request->ormawa_id]);
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
        Kegiatan::destroy($id);
        Alert::success('Berhasil', 'Data Berhasil Dihapus!');
        // return redirect()->route('kegiatan.ormawa.kegiatan', ['id' => $kegiatan->ormawa_id]);
        return response()->json(['message' => 'success']);
    }

    public function detail($id)
    {
        $kegiatan_list = Kegiatan::find($id);
        return response()->json($kegiatan_list);
    }
}
