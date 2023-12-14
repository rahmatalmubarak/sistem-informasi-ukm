@extends('dashboard.templates.main')
@section('title')
Buat Postingan
@endsection
@section('header')
    Halaman Buat Postingan
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('postingan.store') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control form-control-sm @error('kategori') is-invalid @enderror" name="kategori">
                                        <option value="">--Kategori--</option>
                                        <option value="berita" @if (old('berita') == 'berita') selected @endif>Berita</option>
                                        <option value="pengumuman" @if (old('pengumuman') == 'pengumuman') selected @endif>Pengumuman</option>
                                        <option value="agenda kegiatan" @if (old('agenda kegiatan') == 'agenda kegiatan') selected @endif>Agenda Kegiatan</option>
                                    </select>
                                </div>
                                <div class="col-12 d-flex p-0">
                                    <div class="col-6 pl-0">
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul" value="{{old('judul')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="headline">Headline</label>
                                            <input type="text" class="form-control form-control-sm @error('headline') is-invalid @enderror" name="headline" id="headline" placeholder="Headline" value="{{old('headline')}}">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-0">
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control form-control-sm @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_post">Tanggal</label>
                                            <input type="date" class="form-control form-control-sm @error('tgl_post') is-invalid @enderror" name="tgl_post" id="tgl_post" value="{{old('tgl_post')}}">
                                        </div>
                                    </div>
                                </div>
                                <textarea class="form-control tinymce-editor @error('content') is-invalid @enderror" name="content"
                                    id="content">{{old('content')}}</textarea>
                            </div>
                
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <a href="{{ route('postingan.index') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection