<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ormawa_list = Ormawa::paginate(10);
        return view('dashboard.ormawa.index', compact('ormawa_list'));
    }

    public function cari(Request $request)
    {
        $ormawa_list = Ormawa::where('nama', 'LIKE', '%'.$request->cari.'%')->paginate(10);
        return view('dashboard.ormawa.index', compact('ormawa_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.ormawa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'tgl_berdiri' => 'required',
        ]);
        $image = $request->file('logo');
        $image->storeAs('public/img/data/', $image->hashName());
        Ormawa::create([
            'nama' => $request->nama,
            'logo' => $image->hashName(),
            'tentang' => $request->tentang,
            'tgl_berdiri' => $request->tgl_berdiri,
            'tag_line' => $request->tag_line
        ]);

        return redirect()->route('ormawa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ormawa = Ormawa::find($id);

        return view('dashboard.ormawa.detail', compact('ormawa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ormawa = Ormawa::find($id);
        
        return view('dashboard.ormawa.edit', compact('ormawa'));
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
        $ormawa = Ormawa::find($id);
        $request->validate([
            'nama' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'tgl_berdiri' => 'required',
        ]);

        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $image->storeAs('public/img/data/', $image->hashName());

            Storage::delete('public/img/data/' . $ormawa->logo);
            
            $ormawa->update([
                'nama' => $request->nama,
                'tentang' => $request->tentang,
                'logo' => $image->hashName(),
                'tgl_berdiri' => $request->tgl_berdiri,
                'tag_line' => $request->tag_line
            ]);
        }else{
            $ormawa->update([
                'nama' => $request->nama,
                'tentang' => $request->tentang,
                'tgl_berdiri' => $request->tgl_berdiri,
                'tag_line' => $request->tag_line
            ]);
        }

        return redirect()->route('ormawa.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ormawa = Ormawa::find($id);
        Storage::delete('public/img/data/' . $ormawa->logo);
        Ormawa::destroy($id);
        return redirect()->route('ormawa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
