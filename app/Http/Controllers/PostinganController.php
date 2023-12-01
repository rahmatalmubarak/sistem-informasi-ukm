<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Illuminate\Http\Request;

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
        $postingan_list = Postingan::where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
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
        ]);

        Postingan::create([
            'judul' => $request->judul,
            'content' => $request->content,
            'kategori' => $request->kategori
        ]);

        return redirect()->route('postingan.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        ]);

        $postingan->update([
            'judul' => $request->judul,
            'content' => $request->content,
            'kategori' => $request->kategori
        ]);

        return redirect()->route('postingan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Postingan::destroy($id);
        return redirect()->route('postingan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
