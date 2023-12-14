<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Postingan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LandingPageController extends Controller
{
    public function index()
    {
        $postingan_list = Postingan::orderBy('id', 'desc')->paginate(6);

        $pengumuman_list = Postingan::where('kategori', 'pengumuman')->orderBy('id', 'desc')->paginate(3);
        $agenda_list = Postingan::where('kategori', 'agenda')->orderBy('id', 'desc')->paginate(5);
        return view('landing_page.index', compact([
            'postingan_list',
            'pengumuman_list',
            'agenda_list'
        ]));
    }

    public function read_postingan($id)
    {
        $postingan = Postingan::find($id);
        $postingan_list = Postingan::whereNot('id', $id)->orderBy('id', 'desc')->paginate(3);
        return view('landing_page.postingan', compact(['postingan', 'postingan_list']));
    }

    public function postingan()
    {
        $postingan_list = Postingan::orderBy('id', 'desc')->paginate(9);
        return view('landing_page.ormawa.postingan', compact(['postingan_list']));
    }

    public function pengurus()
    {
        return view('landing_page.pengurus');
    }

    public function ormawa()
    {
        return view('landing_page.ormawa.daftar');
    }

    public function detail_ormawa($slug)
    {
        switch ($slug) {
            case 'SEMA-FST':
                $view = 'landing_page.ormawa.sema-fst';
                break;
            case 'DEMA-FST':
                $view = 'landing_page.ormawa.dema-fst';
                break;
            case 'HMPS-SI':
                $view = 'landing_page.ormawa.hmps-si';
                break;
            case 'HMPS-MTK':
                $view = 'landing_page.ormawa.hmps-mtk';
                break;
        }
        return view($view);
    }

    public function daftar_pengurus()
    {
        return view('landing_page.daftar-pengurus');
    }

    public function open_recruitment($id)
    {
        $ormawa_id = $id;
        return view('landing_page.open-recruitment', compact(['ormawa_id']));
    }
    
    public function pendaftaran($id)
    {
        $ormawa_id = $id;
        return view('landing_page.pendaftaran', compact(['ormawa_id']));
    }

    public function kontak(){
        return view('landing_page.kontak');
    }

    public function message(Request $request){
        Message::create([
            'kritik' => $request->kritik,
            'saran' => $request->saran,
            'pesan' => $request->pesan,
            'is_read' => 0
        ]);

        Alert::success('Berhasil', 'Kritik, Saran dan Pesan berhasil terkirim!');
        return redirect()->back();
    }

    public function isRead(Request $request, $id){
        Message::find($id)->update([
            'is_read' => 0
        ]);

        return redirect()->back();
    }
}
