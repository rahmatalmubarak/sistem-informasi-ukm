@extends('dashboard.templates.main')
@section('title')
Laporan
@endsection
@section('header')
    Halaman Kelola Laporan
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-7 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('laporan.cari') }}" method="get">
                            <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="{{old('cari')}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-4 mb-3 ml-5 d-flex justify-content-end">
                    <form action="{{ route('laporan.store') }}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="d-flex align-items-center">
                            <div class="form-group mr-2">
                                <div class="input-group">
                                    <input type="hidden" name="ormawa_id" value="{{Auth::user()->ormawa->id}}">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="file" id="filename">Choose file</label>
                                        <input type="file" class="custom-file-input" name="file" id="file">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">
                                    Tambah Laporan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
                                                    <p class="text-green text-sm">Sudah disetujui</p>
                                                    @else
                                                    <p class="text-red text-sm">Sedang Menunggu disetujui</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('status_laporan.download', ['id'=>$laporan->statusLaporan->id]) }}" method="get">
                                                        @method('GET')
                                                        @csrf
                                                        <button type="submit" class="btn btn-white">
                                                            <i class="nav-icon fas fa-download @if ($laporan->statusLaporan->status == 1) text-blue @endif"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-white" id="show-catatan" data-target="#edit-catatan" data-item-id="{{$laporan->statusLaporan->id}}">
                                                        <i class="nav-icon fas fa-pen"></i>
                                                    </button>
                                                </td>
                                                <td class="d-flex pr-0">
                                                    <a href="javascript:void(0)" class="btn btn-primary mr-1"  id="show-laporan" data-target="#edit-laporan" data-item-id="{{$laporan->id}}">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('laporan.delete', ['id' => $laporan->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form>
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
                        <label for="file">File Laporan</label>
                        <div class="input-group" style="border: 0.5px solid rgb(119, 119, 119); height: 100px;border-radius: 10px;">
                            <div class="custom-file d-flex flex-column justify-content-center align-items-center h-auto">
                                <input type="file" class="custom-file-input w-full @error('file') invalid @enderror" style="height: 100px !important" id="file" name="file">
                                <i class="text-lg fas fa-upload d-block position-absolute"></i>
                            </div>
                        </div>
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
                        <textarea class="form-control" name="catatan" id="catatan" cols="30" rows="10" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
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
                        <label for="file">Surat Keputusan</label>
                        <div class="input-group" style="border: 0.5px solid rgb(119, 119, 119); height: 100px;border-radius: 10px;">
                            <div class="custom-file d-flex flex-column justify-content-center align-items-center h-auto">
                                <input type="file" class="custom-file-input w-full" style="height: 100px !important" id="file" name="file">
                                <i class="text-lg fas fa-upload d-block position-absolute"></i>
                            </div>
                        </div>
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