@extends('dashboard.templates.main')
@section('title')
{{$ormawa->nama}} / Kegiatan
@endsection
@section('header')
    {{-- @if (Auth::user()->role->nama == 'super admin') --}}
        {{$ormawa->nama}} / Kegiatan    
    {{-- @else --}}
        Kelola Kegiatan
    {{-- @endif --}}
@endsection

@section('content')
@php
    setlocale(LC_TIME, 'id_ID');
    \Carbon\Carbon::setLocale('id');
@endphp
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('kegiatan.cari-kegiatan') }}" method="get">
                            <input type="hidden" name="ormawa_id" value="{{$ormawa->id}}">
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
                    <div class="col-2 mb-3 ml-5 d-flex justify-content-start">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-kegiatan">
                            Tambah Kegiatan
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
                                        <th>Nama Kegiatan</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Tempat</th>
                                        @if (Auth::user()->role->id == 2)
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($kegiatan_list->total() != 0)
                                        @foreach ($kegiatan_list as $index => $kegiatan)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$kegiatan->nama}}</td>
                                                <td>{{$kegiatan->jenis}}</td>
                                                <td>{{\Carbon\Carbon::parse($kegiatan->tgl_mulai)->isoFormat('dddd, D MMMM Y')}}<br>
                                                {{\Carbon\Carbon::parse($kegiatan->tgl_mulai)->isoFormat('HH:mm')}} WIB</td>
                                                <td>{{\Carbon\Carbon::parse($kegiatan->tgl_selesai)->isoFormat('dddd, D MMMM Y')}}<br>
                                                {{\Carbon\Carbon::parse($kegiatan->tgl_selesai)->isoFormat('HH:mm')}} WIB</td>
                                                <td>{{$kegiatan->penanggung_jawab}}</td>
                                                <td>{{$kegiatan->tempat}}</td>
                                                @if (Auth::user()->role->id == 2)
                                                    <td class="d-flex">
                                                        <a href="javascript:void(0)" class="btn btn-primary mr-1"  id="show-kegiatan" data-target="#edit-kegiatan" data-item-id="{{$kegiatan->id}}">
                                                            <i class="nav-icon fas fa-edit"></i>
                                                        </a>
                                                        {{-- <form action="{{ route('kegiatan.delete', ['id' => $kegiatan->id]) }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                        </form> --}}
                                                        <button class="btn btn-danger" onclick="hapus('{{ route('kegiatan.delete', ['id' => $kegiatan->id]) }}')" type="submit"><i
                                                                class="nav-icon fas fa-trash-alt"></i></button>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" style="text-align: center"><a href="{{ route('kegiatan.ormawa.kegiatan', ['id' => $ormawa->id]) }}" rel="noopener noreferrer">Tidak Ada Data, Klik untuk refresh</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    <div class="d-flex justify-content-end">
                        {{$kegiatan_list->links()}}
                    </div>
            
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Modal Add Kegiatan --}}
<div class="modal fade" id="tambah-kegiatan">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('kegiatan.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kelola Kegiatan / Tambah Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{$ormawa->id}}" name="ormawa_id">
                    <div class="form-group">
                        <label for="nama">Nama Kegiatan</label>
                        <input type="text" class="form-control @error('nama') invalid @enderror" placeholder="nama" name="nama" value="{{old('nama')}}">
                        @error('nama') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Kegiatan</label>
                        <select class="form-control @error('jenis') invalid @enderror" name="jenis">
                            <option value="rapat">Rapat</option>
                            <option value="pelatihan">Pelatihan</option>
                            <option value="acara">Acara</option>
                        </select>
                        @error('jenis') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_mulai">Tanggal dan Waktu Mulai Kegiatan</label>
                        <input type="datetime-local" class="form-control @error('tgl_mulai') invalid @enderror" placeholder="tgl_mulai" name="tgl_mulai" value="{{old('tgl_mulai')}}">
                        @error('tgl_mulai') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal dan Waktu Selesai Kegiatan</label>
                        <input type="datetime-local" class="form-control @error('tgl_selesai') invalid @enderror" placeholder="tgl_selesai" name="tgl_selesai" value="{{old('tgl_selesai')}}">
                        @error('tgl_selesai') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="penanggung_jawab">Penanggung Jawab</label>
                        <input type="text" class="form-control @error('penanggung_jawab') invalid @enderror" placeholder="penanggung_jawab" name="penanggung_jawab" value="{{old('penanggung_jawab')}}">
                        @error('penanggung_jawab') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control @error('tempat') invalid @enderror" placeholder="tempat" name="tempat" value="{{old('tempat')}}">
                        @error('tempat') <p class="mt-0 text-danger">{{$message}}</p>@enderror
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

{{-- Modal Edit Kegiatan --}}
<div class="modal fade" id="edit-kegiatan">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="editKegiatan">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ormawa_id" value="{{$ormawa->id}}">
                    <div class="form-group">
                        <label for="nama">Nama Kegiatan</label>
                        <input type="text" class="form-control @error('nama') invalid @enderror" placeholder="nama" name="nama" id="nama" value="{{old('nama')}}">
                        @error('nama') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Kegiatan</label>
                        <select class="form-control @error('jenis') invalid @enderror" name="jenis" id="jenis">
                            <option value="rapat">Rapat</option>
                            <option value="pelatihan">Pelatihan</option>
                            <option value="acara">Acara</option>
                        </select>
                        @error('jenis') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_mulai">Tanggal dan Waktu Mulai Kegiatan</label>
                        <input type="datetime-local" class="form-control @error('tgl_mulai') invalid @enderror" placeholder="tgl_mulai" name="tgl_mulai" id="tgl_mulai" value="{{old('tgl_mulai')}}">
                        @error('tgl_mulai') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal dan Waktu Selesai Kegiatan</label>
                        <input type="datetime-local" class="form-control @error('tgl_selesai') invalid @enderror" placeholder="tgl_selesai" name="tgl_selesai" id="tgl_selesai" value="{{old('tgl_selesai')}}">
                        @error('tgl_selesai') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="penanggung_jawab">Penanggung Jawab</label>
                        <input type="text" class="form-control @error('penanggung_jawab') invalid @enderror" placeholder="penanggung_jawab" name="penanggung_jawab" id="penanggung_jawab"
                            value="{{old('penanggung_jawab')}}">
                        @error('penanggung_jawab') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat">Tempat</label>
                        <input type="text" class="form-control @error('tempat') invalid @enderror" placeholder="tempat" name="tempat" id="tempat" value="{{old('tempat')}}">
                        @error('tempat') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form> 
    </div>
</div>


@endsection