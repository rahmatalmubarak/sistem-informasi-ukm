@extends('landing_page.templates.main')

@section('title')
Open Recruitment
@endsection

@section('content')
    <div class="row mt-4">
            <p>Kepengurusan Ormawa</p>
    </div>
    <div class="row mt-3">
        <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
            {{-- <span class="text-bold" style="font-size: 30px">HMPS MTK</span> --}}
        </div>
        <div class="col-12 mt-3">
            <ul class="text-center" style="font-size: 25px;">
                <li class="list-unstyled"><a href="{{ route('landing_page.daftar_pengurus') }}" class="text-black">Periode 2020/2021</a></li>
                <li class="list-unstyled"><a href="" class="">Periode 2021/2022</a></li>
                <li class="list-unstyled"><a href="" class="">Periode 2022/2023</a></li>
                <li class="list-unstyled"><a href="" class="">Periode 2023/2024</a></li>
            </ul>
        </div>
    </div>
@endsection