@extends('landing_page.templates.main')

@section('title')
    Registarasi
@endsection
@section('content')
        <div class="row pt-3">
            <div class="col-12 bg-dark d-flex justify-content-center align-items-center text-center w-full height-25"
                style="height: 130px;">
                <span class="text-bold" style="font-size: 20px">FORM PENDAFTARAN PENGURUS DEMA-FST 2023-2024 F</span>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card card-primary">        
                <form action="{{ route('pendaftar.store') }}" method="post" enctype="multipart/form-data">
                    {{-- // DEMA --}}
                    @method('POST')
                    @csrf
                    <input type="hidden" name="ormawa_id" value="{{$ormawa_id}}"> 
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm @error('nama') invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{old('nama')}}">
                        </div>
                        @error('nama') <p class="text-red">{{$message}}</p> @enderror
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control form-control-sm @error('email') invalid @enderror" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                        </div>
                        @error('email') <p class="text-red">{{$message}}</p> @enderror
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="number" class="form-control form-control-sm @error('nim') invalid @enderror" id="nim" name="nim" placeholder="NIM" value="{{old('nim')}}">
                        </div>
                        @error('nim') <p class="text-red">{{$message}}</p> @enderror
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="number" class="form-control form-control-sm @error('kontak') invalid @enderror" id="kontak" name="kontak" placeholder="Kontak" value="{{old('kontak')}}">
                        </div>
                        @error('kontak') <p class="text-red">{{$message}}</p> @enderror
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelas" value="SI 20 A">
                                <label class="form-check-label">SI 20 A</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelas" value="MTK 20 A">
                                <label class="form-check-label">MTK 20 A</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelas" value="SI 21 A">
                                <label class="form-check-label">SI 21 A</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelas" value="SI 21 B">
                                <label class="form-check-label">SI 21 B</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelas" value="MTK 21 A">
                                <label class="form-check-label">MTK 21 A</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kelas" value="MTK 21 B">
                                <label class="form-check-label">MTK 21 B</label>
                            </div>                      
                        </div>
                        @error('kelas') <p class="text-red">{{$message}}</p> @enderror
                        <div class="form-group">
                            <label for="kepengurusan_periode_sebelumnya">Kepengurusan Periode Sebelumnya</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kepengurusan_sebelumnya" value="DEMA F Periode 2022-2023">
                                <label class="form-check-label">DEMA F Periode 2022-2023</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kepengurusan_sebelumnya" value="HMPS-SI Periode 2022-2023">
                                <label class="form-check-label">HMPS-SI Periode 2022-2023</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kepengurusan_sebelumnya" value="HMPS-MTK Periode 2022-2023 ">
                                <label class="form-check-label">HMPS-MTK Periode 2022-2023 </label>
                            </div>
                        </div>
                        @error('kepengurusan_sebelumnya') <p class="text-red">{{$message}}</p> @enderror
                        <div class="form-group">
                            <label for="tujuan">Tujuan Menjadi Pengurus DEMA</label>
                            <input type="text" class="form-control form-control-sm @error('tujuan') invalid @enderror" id="tujuan" name="tujuan" placeholder="Tujuan Menjadi Pengurus DEMA" value="{{old('tujuan')}}">
                        </div>
                        @error('tujuan') <p class="text-red">{{$message}}</p> @enderror
                        <div class="form-group">
                            <label for="file_syarat">File Syarat Kepengurusan Dema *File di gabungkan dalam bentuk Pdf.</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('file_syarat') invalid @enderror" id="file" name="file_syarat">
                                    <label class="custom-file-label" for="file" id="nama_file">Choose file</label>
                                </div>
                            </div>
                        </div>
                        @error('file_syarat') <p class="text-red">{{$message}}</p> @enderror
                        <input type="hidden" name="konfirmasi" value="3">
                    </div>
        
                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
@endsection