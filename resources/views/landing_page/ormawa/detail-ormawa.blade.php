@extends('landing_page.templates.main')

@section('title')
{{$ormawa->nama}}
@endsection

@section('content')
<div class="row mt-4">
    <p>Ormawa / {{$ormawa->nama}}</p>
</div>

<div class="row mt-3 mb-3">
    <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
        <span class="text-bold" style="font-size: 30px">{{$ormawa->nama}}</span>
    </div>
    @if (!empty($ormawa->informasi_ormawa))
        <div class="col-12 mt-3 px-5">
            <div class="text-center">
                <h4 class="text-bold">Dasar Hukum</h4>
                <p>{{$ormawa->informasi_ormawa->dasar_hukum}}</p>
            </div>
            <div class="text-center mt-5">
                <h4 class="text-bold">VISI</h4>
                <div class="text-left">
                    {!! $ormawa->informasi_ormawa->visi !!}
                </div>
            </div>
            <div class="text-center mt-5">
                <h4 class="text-bold">Misi</h4>
                <div class="text-left">
                    {!! $ormawa->informasi_ormawa->misi !!}
                </div>
            </div>
            <div class="text-center mt-5">
                <h4 class="text-bold">Program Kerja</h4>
                <div class="text-left">
                    {!! $ormawa->informasi_ormawa->proker !!}
                </div>
            </div>
            <div class="text-center mt-5">
                <h4 class="text-bold">Informasi</h4>
                <div class="text-center">
                    {!! $ormawa->informasi_ormawa->informasi !!}
                </div>
            </div>
            <div class="text-center my-5">
                <h4 class="text-bold">Struktur Kepengurusan DEMA 2023 - 2024</h4>
                <div class="text-center">
                    <img src="{{Storage::url('public/img/data/'.$ormawa->informasi_ormawa->foto_pengurus )}}" alt="{{$ormawa->informasi_ormawa->foto_pengurus}}" style="width: 100%; height: auto; padding-left: 200px; padding-right: 200px">
                </div>
            </div>
        </div>
    @else
        <div class="col-12 d-flex justify-content-center mt-3">
            <span style="font-size: 25px;" class="text-bold">Silahkan lengkapi profile UKM</span>
        </div>
    @endif
</div>
@endsection