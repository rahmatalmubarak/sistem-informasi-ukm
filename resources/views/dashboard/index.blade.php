@extends('dashboard.templates.main')
@section('title')
    Dashboard
@endsection
@section('header')
    Dashboard
@endsection
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                @if(Auth::user()->role->id == 1)
                    <p>Selamat datang, {{Auth::user()->role->nama}}</p>
                @else
                    <p>Selamat datang, {{Auth::user()->role->nama}} {{Auth::user()->ormawa->nama}}</p>
                @endif
                @if (Auth::user()->role->id == 1)
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$user_all->count()}}</h3>
                
                                <p class="text-bold text-lg">User</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{$ormawa_all->count()}}</h3>
                
                                <p class="text-bold text-lg">Ormawa</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-university"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$kegiatan_all->count()}}</h3>
                
                                <p class="text-bold text-lg">Kegiatan</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-history"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                @else
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$pendaftar_list->count()}}</h3>
                
                                <p class="text-bold text-lg">Pendaftar</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$laporan_list->count()}}</h3>
                
                                <p class="text-bold text-lg">Laporan</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-book"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$kegiatan_list->count()}}</h3>
                
                                <p class="text-bold text-lg">Kegiatan</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-history"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$arsip_list->count()}}</h3>
                
                                <p class="text-bold text-lg">Arsip Dokumen</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-folder-open"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                @endif
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection