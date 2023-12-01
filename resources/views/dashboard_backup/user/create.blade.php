@extends('dashboard.templates.main')
@section('title')
    Tambah User
@endsection
@section('header')
User
@endsection
@section('content')
<div class="container-fluid py-4">

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
                        <h6>Tambah User</h6>
                    </div>
                </div>
                <div class="card-body p-4 pt-0 pb-2">
                    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="username">Nama</label>
                            <input type="input" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{old('username')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                                value="{{old('password')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="input" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id">
                                <option>Pilih</option>
                                <option value="1" @if (old('role_id')=='1' ) {{'selected'}} @endif>Super Admin</option>
                                <option value="2" @if (old('role_id')=='2' ) {{'selected'}} @endif>Admin</option>
                                <option value="3" @if (old('role_id')=='3' ) {{'selected'}} @endif>User</option>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-primary">Tambah</button>
                            <button type="{{ route('user.index') }}" class="btn bg-gradient-danger">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection 