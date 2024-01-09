@extends('dashboard.templates.main')
@section('title')
Pendaftar
@endsection
@section('header')
    Halaman Kelola Pendaftar
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('pendaftar.cari') }}" method="get">
                            <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="{{old('cari')}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">            
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>NIM</th>
                                        <th>No HP</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pendaftar_list->total() != 0)
                                        @foreach ($pendaftar_list as $index => $pendaftar)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$pendaftar->nama}}</td>
                                                <td>{{$pendaftar->email}}</td>
                                                <td>{{$pendaftar->nim}}</td>
                                                <td>{{$pendaftar->kontak}}</td>
                                                <td>
                                                    <form action="{{ route('pendaftar.download', ['id'=>$pendaftar->id]) }}" method="get">
                                                        @method('GET')
                                                        @csrf
                                                        <button type="submit" class="btn btn-white">
                                                            <i class="nav-icon fas fa-download text-blue"></i>
                                                        </button>
                                                    </form>    
                                                </td>
                                                <td>
                                                    @if ($pendaftar->konfirmasi == 3)
                                                    <p class="text-sm text-warning">Pending</p>
                                                    @elseif ($pendaftar->konfirmasi == 1)
                                                    <p class="text-sm text-success">Diterima</p>
                                                    @elseif($pendaftar->konfirmasi == 0)
                                                    <p class="text-sm text-danger">Ditolak</p>
                                                    @endif
                                                </td>
                                                <td class="d-flex pr-0">
                                                    
                                                    {{-- <form action="{{ route('pendaftar.delete', ['id' => $pendaftar->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        
                                                        <button class="btn btn-danger mr-1" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form> --}}
                                                    
                                                    <a href="{{ route('pendaftar.detail', ['id'=>$pendaftar->id]) }}" class="btn btn-warning mr-1">
                                                        Detail
                                                    </a>
                                                    <button class="btn btn-danger" onclick="hapus('{{ route('pendaftar.delete', ['id' => $pendaftar->id]) }}')"
                                                        type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" style="text-align: center"><a href="{{ route('pendaftar.index') }}" rel="noopener noreferrer">Tidak Ada Data, Klik untuk refresh</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                        <div class="d-flex justify-content-end">
                            {{$pendaftar_list->links()}}
                        </div>
                    </div>
            
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection