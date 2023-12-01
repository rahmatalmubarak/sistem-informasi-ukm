@extends('dashboard.templates.main')
@section('title')
    Ubah Arsip
@endsection
@section('header')
    Arsip
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
    @error('file')
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
                        <h6>Ubah Arsip</h6>
                    </div>
                </div>
                <div class="card-body p-4 pt-0 pb-2">
                    <form method="POST" action="{{ route('arsip.update', $arsip->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Arsip</label>
                            <input type="input" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                                value="{{old('nama', $arsip->nama)}}">
                        </div>
                        <div class="form-group">
                            <label for="file">File Arsip</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file">
                        </div>
                        <input type="hidden" name="ormawa_id" value="{{old('ormawa_id', $arsip->ormawa_id)}}">
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