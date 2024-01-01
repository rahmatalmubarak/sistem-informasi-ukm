@extends('dashboard.templates.main')
@section('title')
Pesan
@endsection
@section('header')
    Halaman Pesan
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-7 ml-3 mb-3">
                    <div class="input-group input-group-md" style="width: 250px; height: 50;">
                        <form class="d-flex" action="{{ route('pesan.cari') }}" method="get">
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
                            <table class="table table-hover text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pengirim</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pesan_list->total() != 0)
                                        @foreach ($pesan_list as $index => $pesan)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{substr($pesan->pengirim,0,15)}}</td>
                                                <td class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary mr-1" id="show-pesan" data-target="#edit-pesan" data-item-id="{{$pesan->id}}">
                                                        Baca
                                                    </button>
                                                    <form action="{{ route('pesan.delete', ['id' => $pesan->id]) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"><i class="nav-icon fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" style="text-align: center"><a href="{{ route('pesan.index') }}" rel="noopener noreferrer">Tidak Ada Data, Klik untuk refresh</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>   
                    </div>
                    <div class="d-flex justify-content-end">
                        {{$pesan_list->links()}}
                    </div>
            
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Modal Edit Catatan --}}
<div class="modal fade" id="edit-pesan">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Catatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="accordion">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                                       Kritik
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                                <div class="card-body" id="kritik">
                                </div>
                            </div>
                        </div>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">
                                        Saran
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                                <div class="card-body" id="saran">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>
@endsection