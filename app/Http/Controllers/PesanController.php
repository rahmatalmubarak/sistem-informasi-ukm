<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan_list = Pesan::paginate(10);
        return view('dashboard.pesan.index', compact('pesan_list'));
    }

    public function cari(Request $request)
    {
        $pesan_list = Pesan::where('judul', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        
        return view('dashboard.pesan.index', compact('pesan_list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan = Pesan::find($id);
        return response()->json($pesan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $pesan = Pesan::find($id);
        $pesan->is_read = 1;
        $pesan->save();
        return response()->json('Pesan sudah dibaca');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesan = Pesan::find($id);
        Storage::delete('public/file/data/' . $pesan->file);
        Pesan::destroy($id);
        Alert::success('Berhasil', 'Data Berhasil Dihapus!');
        return redirect()->route('pesan.index');
    }
}