<?php

namespace App\Http\Controllers;

use App\Models\PhotoPostingan;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'gambar' => 'required',
        ]);

        if($request->hasFile('gambar')){
            $allowedFileExtensions = ['jpg', 'png', 'svg'];
            $gambars = $request->file('gambar');
            foreach ($gambars as $key => $gambar) {
                $extension = $gambar->getClientOriginalExtension();
                if(!in_array($extension, $allowedFileExtensions)){
                    Alert::error('Gagal', 'Ekstension gambar tidak sesuai!');
                    return redirect()->back();
                }
            }
            Postingan::create([
                'ormawa_id' => $request->ormawa_id,
                'judul' => $request->judul,
                'content' => $request->content,
                'kategori' => $request->kategori,
                'headline' => $request->headline,
                'tgl_post' => $request->tgl_post,
            ]);
            $postingan = Postingan::orderBy('id', 'desc')->first();
            foreach ($gambars as $gambar) {
                $gambar->storeAs('public/img/data/', $gambar->hashName());
                PhotoPostingan::create([
                    'postingan_id' => $postingan->id,
                    'gambar' => $gambar->hashName()
                ]);
            }
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
            $allowedFileExtensions = ['jpg', 'png', 'svg'];
            $gambars = $request->file('gambar');
            foreach ($gambars as $key => $gambar) {
                $extension = $gambar->getClientOriginalExtension();
                if (!in_array($extension, $allowedFileExtensions)) {
                    Alert::error('Gagal', 'Ekstension gambar tidak sesuai!');
                    return redirect()->back();
                }
            }
            foreach ($gambars as $gambar) {
                $gambar->storeAs('public/img/data/', $gambar->hashName());
                PhotoPostingan::create([
                    'postingan_id' => $postingan->id,
                    'gambar' => $gambar->hashName()
                ]);
            }

            $postingan->update([
                'ormawa_id' => $request->ormawa_id,
                'judul' => $request->judul,
                'content' => $request->content,
                'kategori' => $request->kategori,
                'headline' => $request->headline,
                'tgl_post' => $request->tgl_post,
            ]);
            
        }else{
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
        return response()->json(['message' => 'success']);
    }

    public function removeImage(Request $request)
    {
        $postingan = PhotoPostingan::where('gambar', $request->slug)
                        ->where('postingan_id', $request->postingan_id)
                        ->first();
        Storage::delete('public/img/data/', $postingan->gambar);
        $postingan->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Gambar Berhasil dihapus'
        ]);
    }
}
