@extends('landing_page.templates.main')

@section('title')
SEMA FST
@endsection

@section('content')
<div class="row mt-4">
    <p>Ormawa / SEMA FST</p>
</div>
<div class="row mt-3">
    <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
        <span class="text-bold" style="font-size: 30px">Senat Mahasiswa (SEMA) FST</span>
    </div>
    <div class="col-12 mt-3 px-5">
        <div class="text-center">
            <h4 class="text-bold">Dasar Hukum</h4>
            <p>Berdasarkan Keputusan Dekan FST No.10 Tahun 2022 Tentang Penetapan Pengurus Senat Mahasiswa FST.</p>
        </div>
        <div class="text-center mt-5">
            <h4 class="text-bold">VISI</h4>
            <div class="text-left">
                <li>Menjadikan Senat Mahasiswa Fakultas Sains dan Teknologi sebagai Lembaga Legislatif Mahasiswa yang Inklusif, Responsif,
                </li>
                <li>dan Aspiratif serta Bisa Mengayomi dan Membentuk Generasi Muda Yang Unggul</li>
            </div>
        </div>
        <div class="text-center mt-5">
            <h4 class="text-bold">Misi</h4>
            <div class="text-left">
                <li>Menjadi Wadah Aspirasi yang Responsif, Cepat dan Tanggap Bagi Seluruh Mahasiswa Fakultas Sains dan Teknologi;</li>
                <li>Membuat dan Melaksanakan Program Kerja yang Bermanfaat Sesuai Kebutuhan Mahasiswa;</li>
                <li>Menjalankan Peran Senat Mahasiswa Sebagai Lembaga Legislatif Mahasiswa;</li>
                <li>Memantau Kinerja Lembaga Eksekutif Secara Efisien, Efektif dan Transparan;</li>
                <li>Membangun Hubungan Kerja dan Komunikasi Antar Ormawa Fakultas Sains Dan Teknologi Dan Birokrat Kampus;</li>
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
                <li>Sekretariat: Gedung Sains Lantai 1 Andalusia, FST UIN Imam Bonjol</li>
                <li>E-mail: : Semafstuinib@gmail.com</li>
                <li>Instagram: @sema.fst.uinib</li>
            </div>
        </div>
        <div class="text-center my-5">
            <h4 class="text-bold">Struktur Kepengurusan SEMA 2023 - 2024</h4>
            <div class="text-center">
                <img src="{{Storage::url('public/img/assets/dema-anggota.png')}}" alt="sema-fst" style="width: 100%; height: auto; padding-left: 200px; padding-right: 200px">
            </div>
        </div>
    </div>
</div>
@endsection