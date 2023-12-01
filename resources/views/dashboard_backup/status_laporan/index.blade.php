@extends('dashboard.templates.main')
@section('title')
    Daftar Status Laporan
@endsection
@section('header')
    Status Laporan
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex">
                    <div class="col-sm-9">
                        <h6>Daftar Status Laporan</h6>
                    </div>
                    <div class="col-sm-3 d-flex">
                        <div class="col-sm-12">
                            <form action="{{ route('status_laporan.cari') }}" method="get">
                                <div class="ms-md-auto pe-md-3">
                                    <div class="input-group">
                                        <button type="submit" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></button>
                                        <input type="text" class="form-control" name="cari" placeholder="Type here...">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div >
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Judul</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Ormawa</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan_list as $i => $laporan)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3">
                                                <p class="text-sm font-weight-bold mb-0">{{$i+1}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{$laporan->judul}}</span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">Nama Ormawa</span>
                                        </td>
                                        <td>
                                            @if ($laporan->statusLaporan->konfirmasi)
                                                <span class="badge bg-gradient-success text-capitalize">Disetujui</span>
                                            @else
                                                <span class="badge bg-gradient-danger text-capitalize">Tunggu</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <div class="dropdown">
                                                <button class="btn btn-link text-secondary mb-0" type="button" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="{{ route('status_laporan.detail', ['id'=>$laporan->id]) }}">Detail</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('status_laporan.edit', ['id'=>$laporan->id]) }}">Konfirmasi</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center pagination-primary">
                {{$laporan_list->links()}}
            </ul>
        </nav>
    </div>
</div>
@endsection