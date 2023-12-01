@extends('dashboard.templates.main')
@section('title')
    Ubah User
@endsection
@section('header')
User
@endsection
@section('content')
<div class="container-fluid py-4">
   @error('foto')
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

    @error('email')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('tgl_lahir')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('jenis_kelamin')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('alamat')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('fakultas')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('jurusan')
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

    @error('password')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text text-white">{{$message}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('role_id')
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
                    <form method="POST" action="{{ route('user.update', $user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="input" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                                value="{{old('nama', $user->nama)}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="input" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                value="{{old('email', $user->email)}}">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                <option>Pilih</option>
                                <option value="laki-laki" @if (old('jenis_kelamin', $user->jenis_kelamin)=='laki-laki' ) {{'selected'}} @endif>Laki-laki</option>
                                <option value="perempuan" @if (old('jenis_kelamin', $user->jenis_kelamin)=='perempuan' ) {{'selected'}} @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                            <input class="form-control @error('tgl_lahir') is-invalid @enderror" type="date" value="{{old('tgl_lahir', $user->tgl_lahir)}}"
                                name="tgl_lahir" id="tgl_lahir">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                rows="3">{{old('alamat', $user->alamat)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <select class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" id="fakultas">
                                <option>Pilih</option>
                                <option value="sistem informasi" @if (old('fakultas', $user->fakultas) =='sistem informasi' ) {{'selected'}} @endif>Sistem
                                    Informasi</option>
                                <option value="bimbingan konseling" @if (old('fakultas', $user->fakultas) =='bimbingan konseling' ) {{'selected'}} @endif>
                                    Bimbingan Konseling</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan">
                                <option>Pilih</option>
                                <option value="sistem informasi" @if (old('jurusan', $user->jurusan)=='sistem informasi' ) {{'selected'}} @endif>Sistem
                                    Informasi
                                </option>
                                <option value="bimbingan konseling" @if (old('jurusan', $user->jurusan)=='bimbingan konseling' ) {{'selected'}} @endif>
                                    Bimbingan
                                    Konseling</option>
                            </select>
                        </div>
                        <input type="hidden" name="konfirmasi" value="0">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                                value="{{old('password')}}">
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
                                <option>Pilih</option>
                                <option value="1" @if (old('role_id', $user->role_id)=='1' ) {{'selected'}} @endif>Super Admin</option>
                                <option value="2" @if (old('role_id', $user->role_id)=='2' ) {{'selected'}} @endif>Admin</option>
                                <option value="3" @if (old('role_id', $user->role_id)=='3' ) {{'selected'}} @endif>User</option>
                            </select>
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