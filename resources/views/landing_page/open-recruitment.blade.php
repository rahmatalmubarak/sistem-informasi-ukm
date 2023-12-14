@extends('landing_page.templates.main')

@section('title')
Open Recruitment
@endsection

@section('content')
@php
    use App\Models\Ormawa;
    $ormawa = Ormawa::where('id', $ormawa_id)->first();
@endphp
<div class="row pt-3">
    <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
        <span class="text-bold" style="font-size: 20px">OPEN RECRUITMENT PENGURUS {{$ormawa->nama}} 2023-2024 FAKULTAS SAINS DAN TEKNOLOGI 👥</span>
    </div>

    <div class="col-12 mt-3 d-flex justify-content-center px-5" style="font-size: 15px;">
        <div class="col-6">
            <ul>
                <li>Bidang Agama dan Sosial</li>
                <li>Bidang Riset dan Keilmuan</li>
                <li>Bidang Pengembangan Minat dan Bakat</li>
            </ul>
        </div>
        <div class="col-6">
            <ul>
                <li>Bidang Pengembangan Sumber Daya Manusia (PSDII)</li>
                <li>Bidang Kewirausahaan</li>
                <li>Bidang Komunikasi dan Informasi</li>
            </ul>
        </div>
    </div>
</div>
<div class="col-12 d-flex justify-content-left mt-3">
    <ul>
        <p>📝Syarat dan Ketentuan : </p>
        <li>Mahasiswa Aktif Fakultas Sains dan Teknologi </li>
        <li>Semester 3 dan 5</li>
        <li>Pernah Menjadi Pengurus di HMPS atau DEMA Periode Sebelumnya</li>
        <li>Minimal IPK 3.00</li>
        <li>Bersedia Mengikuti Wawancara</li>
    </ul>
</div>
<div class="col-12 d-flex justify-content-left mt-3">
    <ul>
        <p>🗄️ Berkas :</p>
        <li>Fotocopy KRS Aktif</li>
        <li>Curriculum Vitae (CV)</li>
        <li>LHS Terakhir</li>
        <li>Surat Pernyataan Bersedia Menjadi Pengurus DEMA-FST</li>
    </ul>
</div>
<div class="col-12 d-flex justify-content-left mt-3">
    <ul>
        <p>🕛Timeline Pendaftaran :</p>
        <li class="list-group">Mahasiswa Aktif Fakultas Sains dan Teknologi </li>
        <li>Pendaftaran dan Pengumpulan Berkas : 28-30 November</li>
        <li>Wawancara : 8-10 Desember</li>
        <li>Pengumuman : 12 Desember</li>
    </ul>
</div>
<div class="col-12 d-flex justify-content-left mt-3">
    <ul>
        <p>📞 Contact Person :</p>
        <li>Faisal (0895613043090) </li>
        <li>Athisa (082172325950)</li>
    </ul>
</div>
<div class="col-12 d-flex justify-content-center my-3">
    <a href="{{ route('landing_page.pendaftaran', ['id'=>$ormawa_id]) }}" class="btn btn-danger" style="width: 100px">Daftar</a>
</div>

@endsection