@extends('dashboard.templates.main')
@section('title')
    Tambah Kegiatan
@endsection
@section('header')
Kegiatan
@endsection
@section('content')
<div class="container-fluid py-4">
    @error('nama')
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
                        <h6>Tambah Kegiatan</h6>
                    </div>
                </div>
                <div class="card-body p-4 pt-0 pb-2">
                    <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="input" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{old('nama')}}">
                        </div>
                        <div class="form-group">
                            <label for="tgl_kegiatan" class="form-control-label">Tanggal Kegiatan</label>
                            <input class="form-control @error('tgl_kegiatan') is-invalid @enderror" type="date" value="{{old('tgl_kegiatan')}}"
                                name="tgl_kegiatan" id="tgl_kegiatan">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{old('deskripsi')}}</textarea>
                        </div>
                        
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection 