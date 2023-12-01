@extends('dashboard.templates.main')
@section('title')
    Ubah Status Laporan
@endsection
@section('header')
    Status Laporan
@endsection
@section('content')
<div class="container-fluid py-4">
    @error('sk')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('konfirmasi')
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
                        <h6>Ubah Status Laporan</h6>
                    </div>
                </div>
                <div class="card-body p-4 pt-0 pb-2">
                    <form method="POST" action="{{ route('status_laporan.update', $laporan->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{$laporan->id}}">
                        <div class="form-group">
                            <label for="sk">Surat Keputusan (SK)</label>
                            <input type="file" class="form-control @error('sk') is-invalid @enderror" name="sk" id="sk">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-switch">
                                <label for="konfirmasi">Status</label>
                                <input class="form-check-input" type="checkbox" id="konfirmasi" name="konfirmasi" @if (old('konfirmasi', $laporan->statusLaporan->konfirmasi) == 1) {{'checked=true'}} @endif>
                                <label class="form-check-label" for="konfirmasi">Konfirmasi</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3">{{old('catatan', $laporan->catatan)}}</textarea>
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