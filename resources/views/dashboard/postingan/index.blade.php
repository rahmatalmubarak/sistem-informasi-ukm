@extends('dashboard.templates.main')
@section('title')
Postingan
@endsection
@section('header')
    Halaman Kelola Postingan
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('postingan.cari') }}" method="get">
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
                    <a href="{{ route('postingan.create') }}" class="btn btn-primary">
                        Postingan Baru
                    </a>
                </div>
                <div class="col-12">
                    <div class="card">            
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($postingan_list->total() != 0)
                                        @foreach ($postingan_list as $index => $postingan)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$postingan->judul}}</td>
                                                <td>{{\Carbon\Carbon::parse($postingan->tgl_post)->format('j F Y')}}</td>
                                                <td>{{$postingan->kategori}}</td>
                                                <td class="d-flex pr-0">
                                                    <a href="{{ route('postingan.edit', ['id'=>$postingan->id]) }}" class="btn btn-primary mr-1" >
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>
                                                    {{-- <form action="{{ route('postingan.delete', ['id' => $postingan->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form> --}}
                                                    <button class="btn btn-danger" onclick="hapus('{{ route('postingan.delete', ['id' => $postingan->id]) }}')" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" style="text-align: center"><a href="{{ route('postingan.index') }}" rel="noopener noreferrer">Tidak Ada Data, Klik untuk refresh</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    <div class="d-flex justify-content-end">
                        {{$postingan_list->links()}}
                    </div>
            
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection