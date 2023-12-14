<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PostinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postingan_list = Postingan::paginate(10);
        return view('dashboard.postingan.index', compact('postingan_list'));
    }

    public function cari(Request $request)
    {
        $postingan_list = Postingan::where('judul', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        return view('dashboard.postingan.index', compact('postingan_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.postingan.create');
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
            'judul' => 'required',
            'content' => 'required',
            'kategori' => 'required',
            'headline' => 'required',
            'tgl_post' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,svg|max:2048',
        ]);
        dd($request->all());
        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/img/data/', $gambar->hashName());

            Postingan::create([
                'ormawa_id' => $request->ormawa_id,
                'judul' => $request->judul,
                'content' => $request->content,
                'kategori' => $request->kategori,
                'headline' => $request->headline,
                'tgl_post' => $request->tgl_post,
                'gambar' => $gambar->hashName(), 
            ]);
        }else{
            Postingan::create([
                'ormawa_id' => $request->ormawa_id,
                'judul' => $request->judul,
                'content' => $request->content,
                'kategori' => $request->kategori,
                'headline' => $request->headline,
                'tgl_post' => $request->tgl_post,
            ]);
        }

        Alert::success('Berhasil', 'Data Berhasil Disimpan!');
        return redirect()->route('postingan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postingan = Postingan::find($id);

        return view('dashboard.postingan.detail', compact('postingan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postingan = Postingan::find($id);

        return view('dashboard.postingan.edit', compact('postingan'));
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
        $postingan = Postingan::find($id);
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'kategori' => 'required',
            'headline' => 'required',
            'tgl_post' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            Storage::delete('public/img/data/', $postingan->gambar);

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/img/data/', $gambar->hashName());

            $postingan->update([
                'ormawa_id' => $request->ormawa_id,
                'judul' => $request->judul,
                'content' => $request->content,
                'kategori' => $request->kategori,
                'headline' => $request->headline,
                'tgl_post' => $request->tgl_post,
                'gambar' => $gambar->hashName(),
            ]);
        } else {
            $postingan->update([
                'ormawa_id' => $request->ormawa_id,
                'judul' => $request->judul,
                'content' => $request->content,
                'kategori' => $request->kategori,
                'headline' => $request->headline,
                'tgl_post' => $request->tgl_post,
            ]);
        }

        Alert::success('Berhasil', 'Data Berhasil Diubah!');
        return redirect()->route('postingan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postingan = Postingan::find($id);
        Storage::delete('public/img/data/', $postingan->gambar);
        Postingan::destroy($id);
        Alert::success('Berhasil', 'Data Berhasil Dihapus!');
        return redirect()->route('postingan.index');
    }
}
