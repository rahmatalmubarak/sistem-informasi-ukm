@extends('landing_page.templates.main')

@section('title')
Daftar Periode Pengurus
@endsection

@section('content')
    <div class="row mt-4">
            <p>P    engurus / Periode Kepengurusan Ormawa</p>
    </div>
    <div class="row mt-3">
        <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
            <span class="text-bold" style="font-size: 30px">Periode Kepengurusan Ormawa</span>
        </div>
        <div class="col-12" style="margin-top: 50px;margin-bottom: 50px">
            <ul class="text-center" style="font-size: 25px;">
                <li class="list-unstyled mb-5"><a href="{{ route('landing_page.daftar_pengurus', ['periode' => '2020-2021']) }}" class="periode-link">Periode 2020/2021</a></li>
                <li class="list-unstyled mb-5"><a href="{{ route('landing_page.daftar_pengurus', ['periode' => '2021-2022']) }}" class="periode-link">Periode 2021/2022</a></li>
                <li class="list-unstyled mb-5"><a href="{{ route('landing_page.daftar_pengurus', ['periode' => '2022-2023']) }}" class="periode-link">Periode 2022/2023</a></li>
                <li class="list-unstyled mb-5"><a href="{{ route('landing_page.daftar_pengurus', ['periode' => '2023-2024']) }}" class="periode-link">Periode 2023/2024</a></li>
            </ul>
        </div>
    </div>
@endsection