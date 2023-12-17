@extends('landing_page.templates.main')

@section('title')
Ormawa Not Found
@endsection

@section('content')
<div class="row mt-4">
    <p>Ormawa / Not Found</p>
</div>
<div class="row mt-3">
    <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
        <span class="text-bold" style="font-size: 30px">Senat Mahasiswa (SEMA) FST</span>
    </div>
    <div class="col-12 mt-3 px-5">
        <div class="text-center">
            <h4 class="text-bold">Data Ormawa Belum Ditambahkan</h4>
            <p>Silahkan hubungi Admin unutuk menambahkan dahulu data ormawa, <a href="{{ route('landing_page.ormawa') }}" class="text-danger">Klik link berikut untuk kembali</a></p>
        </div>
    </div>
</div>
@endsection