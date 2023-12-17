@extends('dashboard.templates.main')
@section('title')
Ormawa
@endsection
@section('header')
    Halaman Kelola Ormawa
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('ormawa.cari') }}" method="get">
                            <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="{{old('cari')}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2 mb-3 ml-5 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-ormawa">
                        Tambah Ormawa
                    </button>
                </div>
                <div class="col-12">
                    <div class="card">            
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Logo</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($ormawa_list->total() != 0)
                                        @foreach ($ormawa_list as $index => $ormawa)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td><img class="img-thumbnail img-size-50" src="{{Storage::url('public/img/data/'.$ormawa->logo)}}" alt="{{$ormawa->nama}}"> </td>
                                                <td>{{$ormawa->nama}}</td>
                                                <td>{{substr($ormawa->deskripsi,0,100).'...'}}</td>
                                                <td class="d-flex pr-0">
                                                    <a href="javascript:void(0)" class="btn btn-primary mr-1"  id="show-ormawa" data-target="#edit-ormawa" data-item-id="{{$ormawa->id}}">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('ormawa.delete', ['id' => $ormawa->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" style="text-align: center"><a href="{{ route('ormawa.index') }}" rel="noopener noreferrer">Tidak Ada Data, Klik untuk refresh</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    <div class="d-flex justify-content-end">
                        {{$ormawa_list->links()}}
                    </div>
            
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Modal Add Ormawa --}}
<div class="modal fade" id="tambah-ormawa">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('ormawa.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Ormawa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control @error('logo') invalid @enderror" placeholder="logo" name="logo">
                        @error('logo') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') invalid @enderror" placeholder="nama" name="nama" value="{{old('nama')}}">
                        @error('nama') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') invalid @enderror" name="deskripsi" cols="30" rows="10">{{old('deskripsi')}}</textarea>
                        @error('deskripsi') <p class="mt-0 text-danger">{{$message}}</p>@enderror
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

{{-- Modal Edit Ormawa --}}
<div class="modal fade" id="edit-ormawa">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="editOrmawa" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Ormawa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <div class="col-12 d-flex">
                            <div class="col-3">
                                <img style="width: 150px;height: auto; " src="{{Storage::url('public/img/data/')}}" alt="" id="logo">
                            </div>
                            <div class="col-9">
                                <input type="file" class="form-control @error('logo') invalid @enderror" placeholder="logo" name="logo" id="logo">
                                @error('logo') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') invalid @enderror" placeholder="nama" name="nama" id="nama" value="{{old('nama')}}">
                        @error('nama') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') invalid @enderror" name="deskripsi" cols="30" rows="10" id="deskripsi">{{old('deskripsi')}}</textarea>
                        @error('deskripsi') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn btn-primary" >Ubah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form> 
    </div>
</div>


@endsection