@extends('dashboard.templates.main')
@section('title')
Detail Pendaftar
@endsection
@section('header')
    Detail Pendaftar
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>: {{$pendaftar->nama}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{$pendaftar->email}}</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>: {{$pendaftar->nim}}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>: {{$pendaftar->kontak}}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>: {{$pendaftar->kelas}}</td>
                        </tr>
                        <tr>
                            <td>Kepengurusan Periode Sebelumnya</td>
                            <td>: {{$pendaftar->kepengurusan_sebelumnya}}</td>
                        </tr>
                        <tr>
                            <td>Tujuan Menjadi Pengurus {{$pendaftar->ormawa->nama}}</td>
                            <td>: {{$pendaftar->tujuan}}</td>
                        </tr>
                    </table>

                    <div class="mt-2 d-flex align-items-center">
                        <p class="text-bold text-md mb-0">Syarat Kepengurusan *PDF</p>
                        <form action="{{ route('pendaftar.download', ['id'=>$pendaftar->id]) }}" method="get">
                            @method('GET')
                            @csrf
                            <button type="submit" class="btn btn-transparent text-blue">Syarat Kepengurusan.pdf</button>
                        </form>
                    </div>

                    <div class="mt-2 d-flex">
                        <form class="mr-2" action="{{ route('pendaftar.status', ['id'=>$pendaftar->id]) }}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="konfirmasi" value="1">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Terima</button>
                        </form>
                        <form action="{{ route('pendaftar.status', ['id'=>$pendaftar->id]) }}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="konfirmasi" value="0">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i> Tolak</button>
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