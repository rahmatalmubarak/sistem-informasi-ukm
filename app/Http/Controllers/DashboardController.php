<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kegiatan;
use App\Models\Laporan;
use App\Models\Ormawa;
use App\Models\Pendaftar;
use App\Models\StatusLaporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user_all = User::all();
        $ormawa_all = Ormawa::all();
        $kegiatan_all = Kegiatan::all();
        $laporan_pending = StatusLaporan::where('status', 0)->get();
        if(Auth::user()->role->id == 2){
            $pendaftar_list = Pendaftar::where('ormawa_id', Auth::user()->ormawa->id)->get();
            $laporan_list = Laporan::where('ormawa_id', Auth::user()->ormawa->id)->get();
            $kegiatan_list = Kegiatan::where('ormawa_id', Auth::user()->ormawa->id)->get();
            $arsip_list = Arsip::where('ormawa_id', Auth::user()->ormawa->id)->get();
            
            return view('dashboard.index', compact([
                'user_all', 'ormawa_all', 'kegiatan_all', 'pendaftar_list','laporan_list', 'kegiatan_list','arsip_list'
            ]));
        }


        return view('dashboard.index', compact([
            'user_all', 'ormawa_all', 'kegiatan_all', 'laporan_pending'
        ]));
    }
}
