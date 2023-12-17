@extends('landing_page.templates.main')

@section('title')
Daftar pengurus
@endsection

@section('content')
<div class="row mt-4">
    <h4>Pengurus Periode {{Request::input('periode')}}</h4>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools float-left">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <form action="{{ route('landing_page.cari_pengurus') }}" class="d-flex" method="get">
                            <input type="hidden" name="periode" value="{{Request::input('periode')}}">
                            <input type="text" name="cari" class="form-control float-left" placeholder="Search" value="{{Request::input('cari')}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Ormawa</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pengurus_list as $pengurus)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$pengurus->nama}}</td>
                                <td>{{$pengurus->ukm}}</td>
                                <td>{{$pengurus->jabatan}}</td>
                                <td>
                                    <img style="width: 100%; height: 100px; object-fit: contain;" src="{{Storage::url('public/img/pengurus/'.$pengurus->gambar)}}" alt="{{$pengurus->gambar}}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{$pengurus_list->links()}}
        </div>

    </div>
</div>
@endsection