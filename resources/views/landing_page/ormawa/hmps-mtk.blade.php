@extends('landing_page.templates.main')

@section('title')
Open Recruitment
@endsection

@section('content')
<div class="row mt-4">
    <p>Ormawa / SEMA FST</p>
</div>
<div class="row mt-3">
    <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
        <span class="text-bold" style="font-size: 30px">HMPS MTK</span>
    </div>
    <div class="col-12 mt-3 px-5">
        <div class="text-center">
            <h4 class="text-bold">Dasar Hukum</h4>
            <p>Surat Keputusan Dekan FST No.12 Tahun 2023 Tentang Penetapan Pengurus Dewan Mahasiswa FST.</p>
        </div>
        <div class="text-center mt-5">
            <h4 class="text-bold">VISI</h4>
            <div class="text-left">
                <li>Menjadikan HMPSI Yang Aktif, Kreatif, Inovatif Serta Bertanggung Jawab yang Berdasarkan Ukhuwah Islamiyah</li>
            </div>
        </div>
        <div class="text-center mt-5">
            <h4 class="text-bold">Misi</h4>
            <div class="text-left">
                <li>Menjadikan HMPSI SI Sebagai Sarana Penyelenggara Kegiatan Yang Mendukung Mahasiswa Untuk Aktif, Inovatif, Serta Kreatif</li>
                <li>Meningkatkan Kebersamaan Dan Kekeluargaan Dengan Internal Dan Eksternal HMPS SI</li>
                <li>Menjadikan HMPS SI Yang berperan Aktif dan Responsif</li>
                <li>Menjadikan dan Melaksanakan Setiap Program Kerja Pada Periode Sebelumnya</li>
            </div>
        </div>
        <div class="text-center mt-5">
            <h4 class="text-bold">Program Kerja</h4>
            <div class="text-left">
                <li>Evaluasi Kinerja Organisasi Mahasiswa FST</li>
                <li>Musyawarah Senat Mahasiswa</li>
                <li>Musyawarah Komisariat Mahasiswa</li>
                <li>Musyawarah Himpunan Mahasiswa</li>
                <li>Rapat Evaluasi Senat</li>
            </div>
        </div>
        <div class="text-center mt-5">
            <h4 class="text-bold">Informasi</h4>
            <div class="text-center">
                <p>Sekretariat: Gedung Sains Lantai 1 Andalusia, FST UIN Imam Bonjol</p>
                <p>E-mail: : demafstuinib@gmail.com</p>
                <p>Instagram: @dema.fstuinib</p>
            </div>
        </div>
        <div class="text-center my-5">
            <h4 class="text-bold">Struktur Kepengurusan HMPS MTK 2023 - 2024</h4>
            <div class="text-center">
                <img src="{{Storage::url('public/img/assets/hmpsmtk-anggota.png')}}" alt="hmps-mtk">
            </div>
        </div>
    </div>
</div>
@endsection