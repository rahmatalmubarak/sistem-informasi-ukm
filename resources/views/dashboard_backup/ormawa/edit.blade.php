@extends('dashboard.templates.main')
@section('title')
    Ubah Ormawa
@endsection
@section('header')
    Ormawa
@endsection
@section('content')
<div class="container-fluid py-4">
    @error('logo')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
 
    @error('nama')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('tgl_berdiri')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex">
                    <div class="col-sm-12">
                        <h6>Ubah Unit Kegitan Mahasiswa</h6>
                    </div>
                </div>
                <div class="card-body p-4 pt-0 pb-2">
                    <form method="POST" action="{{ route('ormawa.update', $ormawa->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="logo">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="input" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama',$ormawa->nama)}}">
                        </div>
                        <div class="form-group">
                            <label for="admin">Admin</label>
                            <select class="form-control @error('admin') is-invalid @enderror" name="admin" id="admin">
                                <option>Pilih</option>
                                {{-- <option value="1" @if (old('admin', $user->admin)=='1' ) {{'selected'}} @endif>Super Admin</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_berdiri" class="form-control-label">Tanggal Berdiri</label>
                            <input class="form-control @error('tgl_berdiri') is-invalid @enderror" type="date" value="{{old('tgl_berdiri', $ormawa->tgl_berdiri)}}"
                                name="tgl_berdiri" id="tgl_berdiri">
                        </div>
                        <div class="form-group">
                            <label for="tag_line">Tag Line</label>
                            <input type="input" class="form-control" name="tag_line" id="tag_line"
                                value="{{old('tag_line', $ormawa->tag_line)}}">
                        </div>
                        <div class="form-group">
                            <label for="tentang">Tentang</label>
                            <textarea class="form-control" id="tentang" name="tentang" rows="3">{{old('tentang',$ormawa->tentang)}}</textarea>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection 