@extends('dashboard.templates.main')
@section('title')
Arsip
@endsection
@section('header')
    Kelola Arsip Dokumen
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('arsip.cari') }}" method="get">
                            <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="{{old('cari')}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @if (Auth::user()->role->id == 2)
                    <div class="col-2 mb-3 ml-5 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary text-sm" data-toggle="modal" data-target="#tambah-arsip">
                            Upload Arsip Dokumen
                        </button>
                    </div>
                @endif
                <div class="col-12">
                    <div class="card">            
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Upload</th>
                                        <th>Nama File</th>
                                        <th>Unduh</th>
                                        @if (Auth::user()->role->id == 2)
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($arsip_list->total() != 0)
                                        @foreach ($arsip_list as $index => $arsip)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{\Carbon\Carbon::parse($arsip->tgl_upload)->format('j F Y')}}</td>
                                                <td>{{$arsip->nama}}</td>
                                                <td>
                                                    <form action="{{ route('arsip.download', ['id'=>$arsip->id]) }}" method="get">
                                                        @method('GET')
                                                        @csrf
                                                        <button type="submit" class="btn btn-white text-blue">
                                                            <i class="nav-icon fas fa-download"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @if (Auth::user()->role->id == 2)
                                                <td class="d-flex pr-0">
                                                    {{-- <form action="{{ route('arsip.delete', ['id' => $arsip->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form> --}}
                                                    <button class="btn btn-danger" onclick="hapus('{{ route('arsip.delete', ['id' => $arsip->id]) }}')"
                                                        type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" style="text-align: center"><a href="{{ route('arsip.index') }}" rel="noopener noreferrer">Tidak Ada Data, Klik untuk refresh</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    <div class="d-flex justify-content-end">
                        {{$arsip_list->links()}}
                    </div>
            
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Modal Add Arsip --}}
<div class="modal fade" id="tambah-arsip">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('arsip.store') }}" class="dropzone" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Dokumen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex">
                        <input type="hidden" name="ormawa_id" value="1">
                        <div class="form-group col-6">
                            <label for="nama">Nama Dokumen</label>
                            <input type="text" class="form-control @error('nama') invalid @enderror" placeholder="nama" name="nama" value="{{old('nama')}}">
                            @error('nama') <p class="text-red">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="tgl_upload">Tanggal</label>
                            <input type="date" class="form-control @error('tgl_upload') invalid @enderror" placeholder="tgl_upload" name="tgl_upload">
                            @error('tgl_upload') <p class="text-red">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="file">Dokumen Arsip</label>
                            <div class="input-group" style="border: 0.5px solid rgb(119, 119, 119); height: 100px;border-radius: 10px;">
                                <div class="custom-file d-flex flex-column justify-content-center align-items-center h-auto">
                                    <input type="file" class="custom-file-input w-full @error('file') invalid @enderror" style="height: 100px !important" id="file" name="file">
                                    <i class="text-lg fas fa-upload d-block position-absolute"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form> 
    </div>
</div> 

@endsection