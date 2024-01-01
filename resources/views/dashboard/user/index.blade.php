@extends('dashboard.templates.main')
@section('title')
User
@endsection
@section('header')
    Halaman Kelola User
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('user.cari') }}" method="get">
                            <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="{{old('cari')}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2 mb-3 ml-5 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-user">
                        Tambah User
                    </button>
                </div>
                <div class="col-12">
                    <div class="card">            
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        {{-- <th>Password</th> --}}
                                        <th>Email</th>
                                        <th>User/Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($user_list->total() != 0)
                                        @foreach ($user_list as $index => $user)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$user->username}}</td>
                                                {{-- <td>{{$user->password}}</td> --}}
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->role->nama}}</td>
                                                <td class="d-flex pr-0">
                                                    <a href="javascript:void(0)" class="btn btn-primary mr-1"  id="show-user" data-target="#edit-user" data-item-id="{{$user->id}}">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    {{-- <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        
                                                        <button class="btn btn-danger show_confirm" data-confirm-delete="true"  type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form> --}}
                                                    <button class="btn btn-danger" onclick="hapus('{{route('user.delete', ['id' => $user->id])}}')" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" style="text-align: center"><a href="{{ route('user.index') }}" rel="noopener noreferrer">Tidak Ada Data, Klik untuk refresh</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    <div class="d-flex justify-content-end">
                        {{$user_list->links()}}
                    </div>
            
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Modal Add User --}}
<div class="modal fade" id="tambah-user">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('user.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') invalid @enderror" placeholder="username" name="username" value="{{old('username')}}">
                        @error('username') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="d-flex">
                            <input type="password" class="form-control @error('password') invalid @enderror" placeholder="Password" name="password" id="password1" value="{{old('password')}}">
                            <span class="password-show">
                                <i class="fa fa-eye" id="togglePassword1" style="cursor: pointer"></i>
                            </span>
                        </div>
                        @error('password') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') invalid @enderror" placeholder="Email" name="email" value="{{old('email')}}">
                        @error('email') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group" id="admin_ormawa">
                        <label for="ormawa_id">Admin Ormawa</label>
                        <select class="form-control @error('ormawa_id') invalid @enderror" name="ormawa_id" id="ormawa_id" value="{{old('ormawa_id')}}">
                            <option value="">Pilih</option>
                            @foreach ($ormawa_list as $ormawa)
                            <option value="{{$ormawa->id}}">{{$ormawa->nama}}</option>
                            @endforeach
                        </select>
                        @error('ormawa_id') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="role_id">Role/level</label>
                        <select class="form-control @error('role_id') invalid @enderror" name="role_id" id="role_id">
                            <option value="">Pilih</option>
                            <option value="1" @if (old('role_id') == 1 ) selected @endif>Super Admin</option>
                            <option value="2" @if (old('role_id') == 2 ) selected @endif>Admin</option>
                        </select>
                        @error('role_id') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form> 
    </div>
</div>

{{-- Modal Edit User --}}
<div class="modal fade" id="edit-user">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="editUser">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') invalid @enderror" id="username" placeholder="username" name="username" value="{{old('username')}}">
                        @error('username') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="d-flex">
                            <input type="password" class="form-control @error('password') invalid @enderror" placeholder="Password" name="password" id="password2" value="{{old('password')}}">
                            <span class="password-show">
                                <i class="fa fa-eye" id="togglePassword2" style="cursor: pointer"></i>
                            </span>
                            @error('password') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') invalid @enderror" id="email" placeholder="Email" name="email" value="{{old('email')}}">
                        @error('email') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group" id="admin_ormawa_edit">
                        <label for="ormawa_id">Admin Ormawa</label>
                        <select class="form-control @error('ormawa_id') invalid @enderror" name="ormawa_id" id="ormawa_id_edit" value="{{old('ormawa_id')}}">
                            <option value="">Pilih</option>
                            @foreach ($ormawa_list as $ormawa)
                                <option value="{{$ormawa->id}}">{{$ormawa->nama}}</option>
                            @endforeach
                        </select>
                        @error('ormawa_id') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="form-group">
                        <label for="role_id">Role/level</label>
                        <select class="form-control @error('role_id') invalid @enderror" name="role_id" id="role_id_edit" value="{{old('role_id')}}">
                            <option value="">Pilih</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                        </select>
                        @error('role_id') <p class="mt-0 text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form> 
    </div>
</div>


@endsection