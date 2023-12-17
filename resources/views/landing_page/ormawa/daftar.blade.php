@extends('landing_page.templates.main')

@section('title')
Open Recruitment
@endsection

@section('content')
    <div class="row pt-4">
            <p>Home / Ormawa</p>
    </div>
    <div class="row pt-3">
        <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25" style="height: 130px;">
            <span class="text-bold" style="font-size: 30px">Ormawa</span>
        </div>

        <div class="pt-3 ml-3 ">
            <h5><u>Organisasi Mahasiswa</u></h5>
        </div>
        <div class="col-12 d-flex justify-content-between px-2 mt-3 flex-wrap">
            @foreach ($ormawa_list as $ormawa)
                <div class="col-md-5 col-sm-6 col-12">
                    <a href="{{ route('landing_page.detail_ormawa', ['slug'=>str_replace(' ', '-', $ormawa->nama)]) }}">
                        <div class="info-box bg-info" style="min-height: 150px">
                            <span class="info-box-icon p-2" style="width: 140px;">
                                <img src="{{Storage::url('public/img/data/'.$ormawa->logo)}}" alt="{{$ormawa->gambar}}">
                            </span>
                    
                            <div class="info-box-content">
                                <span class="info-box-text text-bold">{{$ormawa->nama}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
            @endforeach
        </div>
    </div>
@endsection