<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kegiatan;
use App\Models\Laporan;
use App\Models\Ormawa;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user_all = User::all();
        $ormawa_all = Ormawa::all();
        $kegiatan_all = Kegiatan::all();

        $pendaftar_list = Pendaftar::where('ormawa_id', 1)->get();
        $laporan_list = Laporan::where('ormawa_id', 1)->get();
        $kegiatan_list = Kegiatan::where('ormawa_id', 1)->get();
        $arsip_list = Arsip::where('ormawa_id', 1)->get();

        return view('dashboard.index', compact([
            'user_all', 'ormawa_all', 'kegiatan_all', 'pendaftar_list','laporan_list', 'kegiatan_list','arsip_list'
        ]));
    }
}
