<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
        $admin_list = User::where('role_id', 2)->get();

        return view('dashboard.ormawa.index', compact('ormawa_list', 'admin_list'));
    }

    public function cari(Request $request)
    {
        $ormawa_list = Ormawa::where('nama', 'LIKE', '%'.$request->cari.'%')->paginate(10);
        return view('dashboard.ormawa.index', compact('ormawa_list'));
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'deskripsi' => 'required',
        ]);

        $image = $request->file('logo');
        $image->storeAs('public/img/data/', $image->hashName());
        Ormawa::create([
            'nama' => $request->nama,
            'logo' => $image->hashName(),
            'deskripsi' => $request->deskripsi,
        ]);
        
        Alert::success('Sukses', 'Ormawa berhasil ditambahkan');
        return redirect()->route('ormawa.index');
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

        return response()->json($ormawa);
        // return view('dashboard.ormawa.detail', compact('ormawa'));
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
            'deskripsi' => 'required',
        ]);
        
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $image->storeAs('public/img/data/', $image->hashName());

            Storage::delete('public/img/data/' . $ormawa->logo);
            
            $ormawa->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'logo' => $image->hashName(),

            ]);
        }else{
            $ormawa->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,

            ]);
        }

        Alert::success('Sukses', 'Data Berhasil Diubah!');
        return redirect()->route('ormawa.index');
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
        Alert::success('Sukses', 'Data Berhasil Dihapus!');
        return redirect()->route('ormawa.index');
    }


}
