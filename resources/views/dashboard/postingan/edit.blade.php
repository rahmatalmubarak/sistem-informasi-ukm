@extends('dashboard.templates.main')
@section('title')
Ubah Postingan
@endsection
@section('header')
    Halaman Ubah Postingan
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('postingan.update', ['id' => $postingan->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="ormawa_id" value="{{Auth::user()->ormawa->id}}">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control form-control-sm @error('kategori') is-invalid @enderror" name="kategori">
                                        <option value="">--Kategori--</option>
                                        <option value="berita" @if (old('berita', $postingan->kategori) == 'berita') selected @endif>Berita</option>
                                        <option value="pengumuman" @if (old('pengumuman', $postingan->kategori) == 'pengumuman') selected @endif>Pengumuman</option>
                                        <option value="agenda kegiatan" @if (old('agenda kegiatan', $postingan->kategori) == 'agenda kegiatan') selected @endif>Agenda Kegiatan</option>
                                    </select>
                                    @error('kategori') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-12 d-flex p-0">
                                    <div class="col-6 pl-0">
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control form-control-sm @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul" value="{{old('judul', $postingan->judul)}}">
                                            @error('judul') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="headline">Headline</label>
                                            <input type="text" class="form-control form-control-sm @error('headline') is-invalid @enderror" name="headline" id="headline" placeholder="Headline" value="{{old('headline', $postingan->headline)}}">
                                            @error('headline') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="col-6 pr-0">
                                        @if ($postingan->gambar->count() > 0)
                                        <p class="text-danger" style="font-size: 15px">Gambar yang dihapus tidak bisa dikembalikan lagi</p>
                                            <div class="d-flex flex-wrap">
                                                @foreach ($postingan->gambar as $index => $gambar)
                                                    <div class="ml-1 d-flex" data-index="{{$index}}">
                                                        <img src="{{Storage::url('public/img/data/'.$gambar->gambar)}}" alt="" style="height:80px; object-fit: cover;margin-bottom:5px">  
                                                        <span id="remove-image" style="margin-top: -10px; margin-left: -5px; cursor: pointer; " data-slug="{{$gambar->gambar}}" data-index="{{$index}}" data-postingan="{{$postingan->id}}"><i class="fas fa-times"></i></span>                                          
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control form-control-sm @error('gambar') is-invalid @enderror" name="gambar[]" id="gambar" multiple>
                                            @error('gambar') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_post">Tanggal</label>
                                            <input type="date" class="form-control form-control-sm @error('tgl_post') is-invalid @enderror" name="tgl_post" id="tgl_post" value="{{old('tgl_post', $postingan->tgl_post)}}">
                                            @error('tgl_post') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <textarea class="form-control tinymce-editor @error('content') is-invalid @enderror" name="content"
                                    id="content">{{old('content', $postingan->content)}}</textarea>
                                @error('content') <p class="mt-0 text-danger">{{$message}}</p>@enderror
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