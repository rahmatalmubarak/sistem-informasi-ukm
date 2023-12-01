@extends('dashboard.templates.main')
@section('title')
    Tambah Postingan
@endsection
@section('header')
Postingan
@endsection
@section('content')
<div class="container-fluid py-4">
@error('judul')
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
                        <h6>Tambah Postingan</h6>
                    </div>
                </div>
                <div class="card-body p-4 pt-0 pb-2">
                    <form method="POST" action="{{ route('postingan.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="input" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{old('judul')}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Konten</label>
                            <textarea class="form-control tinymce-editor @error('content') is-invalid @enderror" name="content" id="content" >{{old('content')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori">
                                <option>Pilih</option>
                                <option value="pengumuman" @if (old('kategori')=='pengumuman' ) {{'selected'}} @endif>Pengumuman</option>
                                <option value="berita" @if (old('kategori')=='berita' ) {{'selected'}} @endif>Berita</option>
                                <option value="agenda" @if (old('kategori')=='agenda' ) {{'selected'}} @endif>Agenda</option>
                            </select>
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