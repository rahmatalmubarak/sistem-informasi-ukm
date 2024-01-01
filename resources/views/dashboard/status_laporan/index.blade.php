@extends('dashboard.templates.main')
@section('title')
Status Laporan
@endsection
@section('header')
    Halaman Status Laporan
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('status_laporan.cari') }}" method="get">
                            <input type="text" name="cari" class="form-control @error('judul') invalid @enderror float-right" placeholder="Search" value="{{old('cari')}}">
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-laporan">
                            Tambah Laporan
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
                                        <th>Judul Laporan</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>SK</th>
                                        <th>Catatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($laporan_list->total() != 0)
                                        @foreach ($laporan_list as $index => $laporan)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$laporan->judul}}</td>
                                                <td>
                                                    <form action="{{ route('laporan.download', ['id'=>$laporan->id]) }}" method="get">
                                                        @method('GET')
                                                        @csrf
                                                        <button type="submit" class="btn btn-white ">
                                                            <i class="nav-icon fas fa-download text-blue"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    @if ($laporan->statusLaporan->status == 1)
                                                    <p class="text-green text-sm">Sudah disetujui </p>
                                                    @elseif ($laporan->statusLaporan->status == 2)
                                                    <p class="text-red text-sm">Ditolak</p>
                                                    @else
                                                    <p class="text-warning text-sm">Pending</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-white" data-target="#edit-sk"
                                                        data-item-id="{{$laporan->statusLaporan->id}}" @if ($laporan->statusLaporan->status == 1) id="show-sk"  @endif>
                                                        <i class="nav-icon fas fa-download @if($laporan->statusLaporan->sk) text-blue @endif"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-white" data-target="#edit-catatan" data-item-id="{{$laporan->statusLaporan->id}}" @if ($laporan->statusLaporan->status == 1) id="show-catatan" @endif>
                                                        <i class="nav-icon fas fa-pen @if($laporan->statusLaporan->catatan) text-blue @endif"></i>
                                                    </button>
                                                </td>
                                                <td class="d-flex pr-0">
                                                    <form class="mr-1" action="{{ route('status_laporan.update-status', ['id' => $laporan->statusLaporan->id]) }}" method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="btn 
                                                            @if ($laporan->statusLaporan->status == 1)
                                                            btn-danger
                                                            @else
                                                            btn-success
                                                            @endif
                                                            " type="submit">
                                                            @if ($laporan->statusLaporan->status == 0 || $laporan->statusLaporan->status == 2)
                                                                <i class="nav-icon fas fa-check"></i>
                                                            @else
                                                                <i class="nav-icon fas fa-times"></i>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    {{-- <form action="{{ route('laporan.delete', ['id' => $laporan->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form> --}}
                                                    {{-- <button class="btn btn-danger" onclick="hapus('{{route('laporan.delete', ['id' => $laporan->id])}}')" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" style="text-align: center"><a href="{{ route('laporan.index') }}" rel="noopener noreferrer">Tidak Ada Data, Klik untuk refresh</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    <div class="d-flex justify-content-end">
                        {{$laporan_list->links()}}
                    </div>
            
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Modal Add Laporan --}}
@if (Auth::user()->role->id == 2)
<div class="modal fade" id="tambah-laporan">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Laporan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ormawa_id" value="{{Auth::user()->ormawa->id}}">
                    <div class="form-group">
                        <label for="judul">Nama</label>
                        <input type="text" class="form-control @error('judul') invalid @enderror" placeholder="judul" name="judul" value="{{old('judul')}}">
                        @error('judul') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="file">File Laporan</label>
                        <input type="file" class="form-control @error('file') invalid @enderror" placeholder="file" name="file">
                        @error('file') <p class="mt-0 text-danger">{{$message}}</p>@enderror
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

{{-- Modal Edit Laporan --}}
<div class="modal fade" id="edit-laporan">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="editLaporan" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Laporan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Nama</label>
                        <input type="text" class="form-control @error('judul') invalid @enderror" placeholder="judul" name="judul" id="judul" value="{{old('judul')}}">
                        @error('judul') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="file">File Laporan</label>
                        <input type="file" class="form-control @error('file') invalid @enderror" placeholder="file" name="file">
                        @error('file') <p class="mt-0 text-danger">{{$message}}</p>@enderror
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
@endif
{{-- Modal Edit Catatan --}}
<div class="modal fade" id="edit-catatan">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="editCatatan" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Catatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control @error('catatan') invalid @enderror" name="catatan" id="catatan" cols="30" rows="10"></textarea>
                        @error('catatan') <p class="mt-0 text-danger">{{$message}}</p>@enderror
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

{{-- Modal Add SK --}}
<div class="modal fade" id="edit-sk">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="editSK" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Surat Keputusan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file">File SK</label>
                        <input type="file" class="form-control @error('file') invalid @enderror" placeholder="file" name="file">
                        @error('file') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form> 
    </div>
</div>


@endsection