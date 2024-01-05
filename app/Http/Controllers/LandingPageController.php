<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ormawa;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;

class LandingPageController extends Controller
{
    public function index()
    {
        $postingan_list = Postingan::orderBy('id', 'desc')->paginate(6);

        $pengumuman_list = Postingan::where('kategori', 'pengumuman')->orderBy('id', 'desc')->paginate(4);
        $berita_list = Postingan::whereNot('kategori', 'pengumuman')
                                ->orderBy('id', 'desc')->paginate(6);
        $agenda_list = Postingan::where('kategori', 'agenda')->orderBy('id', 'desc')->paginate(5);
        return view('landing_page.index', compact([
            'postingan_list',
            'pengumuman_list',
            'agenda_list',
            'berita_list',
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
        $ormawa_list = Ormawa::all();
        return view('landing_page.ormawa.daftar', compact(['ormawa_list']));
    }

    public function detail_ormawa($slug)
    {
       $slug = str_replace('-',' ',$slug);
       $ormawa = Ormawa::where('nama', $slug)->first();
       return view('landing_page.ormawa.detail-ormawa', compact('ormawa'));
    }

    public function daftar_pengurus(Request $request)
    {
        $pengurus_list =  [];
        switch ($request->input('periode')) {
            case '2020-2021':
                $pengurus_list =  $this->periode2020_2021();;
                break;
            case '2021-2022':
                $pengurus_list =  $this->periode2021_2022();;
                break;
            case '2022-2023':
                $pengurus_list =  $this->periode2022_2023();;
                break;
            case '2023-2024':
                $pengurus_list =  $this->periode2023_2024();;
                break;
            default:
                # code...
                break;
        }
        $pengurus_list = $this->paginate($pengurus_list)->setPath('pengurus/daftar-pengurus?periode='. $request->input('periode'));
        return view('landing_page.daftar-pengurus', compact('pengurus_list'));
    }

    public function cari_pengurus(Request $request)
    {
        $cari = $request->input('cari');
        $pengurus_list =  [];
        switch ($request->input('periode')) {
            case '2020-2021':
                $pengurus_list =  $this->periode2020_2021();
                break;
            case '2021-2022':
                $pengurus_list =  $this->periode2021_2022();
                break;
            case '2022-2023':
                $pengurus_list =  $this->periode2022_2023();
                break;
            case '2023-2024':
                $pengurus_list =  $this->periode2023_2024();
                break;
            default:
                # code...
                break;
        }
        $no = 1;
        $pengurus_list = collect($pengurus_list)->filter(function($item, $index) use ($cari, $no) {
            if(
                false !== stripos($item->nama, $cari) ||
                false !== stripos($item->ukm, $cari) ||
                false !== stripos($item->jabatan, $cari)
            ){
                return $item;
            }
        });

        $pengurus_list = $this->paginate($pengurus_list)->setPath('?periode='. $request->input('periode').'&cari='.$cari);
        return view('landing_page.daftar-pengurus', compact('pengurus_list'));
    }
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
            'pengirim' => $request->pengirim,
            'is_read' => 0
        ]);

        Alert::success('Berhasil', 'Kritik, Saran dan Pesan berhasil terkirim!');
        return redirect()->back();
    }

    public function read_message($id)
    {
        $message = Message::find($id);

        return response()->json('message');
    }

    public function cari(Request $request)
    {
        $cari = $request->input('cari');
        $postingan_list = Postingan::where('judul', 'Like', '%'. $cari. '%')->paginate(6)->setPath('?cari='.$cari);

        return view('landing_page.ormawa.postingan', compact(['postingan_list']));
    }

    private function periode2020_2021()
    {
        $pengurus_list = [
            // 1
            (object)[
                'no' => 1,
                'nama' => 'asep',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 2
            (object)[
                'no' => 2,
                'nama' => 'Miku',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 3
            (object)[
                'no' => 3,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 4
            (object)[
                'no' => 4,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 5
            (object)[
                'no' => 5,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 6
            (object)[
                'no' => 6,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 7
            (object)[
                'no' => 7,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 8
            (object)[
                'no' => 8,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 9
            (object)[
                'no' => 9,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 10
            (object)[
                'no' => 10,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //11
            (object)[
                'no' => 11,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //12
            (object)[
                'no' => 12,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //13
            (object)[
                'no' => 13,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //14
            (object)[
                'no' => 14,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //15
            (object)[
                'no' => 15,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //16
            (object)[
                'no' => 16,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //17
            (object)[
                'no' => 17,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //18
            (object)[
                'no' => 18,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //19
            (object)[
                'no' => 19,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //20
            (object)[
                'no' => 20,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //21
            (object)[
                'no' => 21,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //22
            (object)[
                'no' => 22,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //23
            (object)[
                'no' => 23,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //24
            (object)[
                'no' => 24,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //25
            (object)[
                'no' => 25,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //26
            (object)[
                'no' => 26,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //27
            (object)[
                'no' => 27,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //28
            (object)[
                'no' => 28,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //29
            (object)[
                'no' => 29,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //30
            (object)[
                'no' => 30,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],

        ];
        return $pengurus_list;
    }

    private function periode2021_2022()
    {
        $pengurus_list = [
            // 1
            (object)[
                'no' => 1,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 2
            (object)[
                'no' => 2,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 3
            (object)[
                'no' => 3,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 4
            (object)[
                'no' => 4,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 5
            (object)[
                'no' => 5,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 6
            (object)[
                'no' => 6,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 7
            (object)[
                'no' => 7,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 8
            (object)[
                'no' => 8,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 9
            (object)[
                'no' => 9,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 10
            (object)[
                'no' => 10,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //11
            (object)[
                'no' => 11,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //12
            (object)[
                'no' => 12,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //13
            (object)[
                'no' => 13,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //14
            (object)[
                'no' => 14,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //15
            (object)[
                'no' => 15,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //16
            (object)[
                'no' => 16,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //17
            (object)[
                'no' => 17,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //18
            (object)[
                'no' => 18,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //19
            (object)[
                'no' => 19,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //20
            (object)[
                'no' => 20,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //21
            (object)[
                'no' => 21,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //22
            (object)[
                'no' => 22,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //23
            (object)[
                'no' => 23,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //24
            (object)[
                'no' => 24,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //25
            (object)[
                'no' => 25,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //26
            (object)[
                'no' => 26,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //27
            (object)[
                'no' => 27,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //28
            (object)[
                'no' => 28,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //29
            (object)[
                'no' => 29,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //30
            (object)[
                'no' => 30,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],

        ];
        return $pengurus_list;
    }
    private function periode2022_2023()
    {
        $pengurus_list = [
            // 1
            (object)[
                'no' => 1,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 2
            (object)[
                'no' => 2,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 3
            (object)[
                'no' => 3,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 4
            (object)[
                'no' => 4,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 5
            (object)[
                'no' => 5,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 6
            (object)[
                'no' => 6,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 7
            (object)[
                'no' => 7,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 8
            (object)[
                'no' => 8,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 9
            (object)[
                'no' => 9,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 10
            (object)[
                'no' => 10,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //11
            (object)[
                'no' => 11,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //12
            (object)[
                'no' => 12,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //13
            (object)[
                'no' => 13,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //14
            (object)[
                'no' => 14,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //15
            (object)[
                'no' => 15,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //16
            (object)[
                'no' => 16,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //17
            (object)[
                'no' => 17,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //18
            (object)[
                'no' => 18,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //19
            (object)[
                'no' => 19,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //20
            (object)[
                'no' => 20,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //21
            (object)[
                'no' => 21,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //22
            (object)[
                'no' => 22,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //23
            (object)[
                'no' => 23,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //24
            (object)[
                'no' => 24,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //25
            (object)[
                'no' => 25,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //26
            (object)[
                'no' => 26,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //27
            (object)[
                'no' => 27,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //28
            (object)[
                'no' => 28,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //29
            (object)[
                'no' => 29,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //30
            (object)[
                'no' => 30,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],

        ];
        return $pengurus_list;
    }
    private function periode2023_2024()
    {
        $pengurus_list = [
            // 1
            (object)[
                'no' => 1,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 2
            (object)[
                'no' => 2,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 3
            (object)[
                'no' => 3,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 4
            (object)[
                'no' => 4,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 5
            (object)[
                'no' => 5,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 6
            (object)[
                'no' => 6,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 7
            (object)[
                'no' => 7,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 8
            (object)[
                'no' => 8,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 9
            (object)[
                'no' => 9,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            // 10
            (object)[
                'no' => 10,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //11
            (object)[
                'no' => 11,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //12
            (object)[
                'no' => 12,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //13
            (object)[
                'no' => 13,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //14
            (object)[
                'no' => 14,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //15
            (object)[
                'no' => 15,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //16
            (object)[
                'no' => 16,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //17
            (object)[
                'no' => 17,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //18
            (object)[
                'no' => 18,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //19
            (object)[
                'no' => 19,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //20
            (object)[
                'no' => 20,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //21
            (object)[
                'no' => 21,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //22
            (object)[
                'no' => 22,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //23
            (object)[
                'no' => 23,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //24
            (object)[
                'no' => 24,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //25
            (object)[
                'no' => 25,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //26
            (object)[
                'no' => 26,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //27
            (object)[
                'no' => 27,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //28
            (object)[
                'no' => 28,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //29
            (object)[
                'no' => 29,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            //30
            (object)[
                'no' => 30,
                'nama' => 'Fulan bin fulan',
                'ukm' => 'SEMA FST',
                'jabatan' => 'Ketua UMUM',
                'gambar' => 'pengurus1.jpg'
            ],
            
        ];
        return $pengurus_list;
    }
}
