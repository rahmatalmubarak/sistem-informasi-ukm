@extends('landing_page.templates.main')

@section('title')
Daftar pengurus
@endsection

@section('content')
<div class="row mt-4">
    <h4>Pengurus Periode 2021 / 2022</h4>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools float-left">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-left" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Ormawa</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Innamul Ikhwana</td>
                            <td>HMPS SI</td>
                            <td>Ketua HMPS SI</td>
                            <td>
                                <img src="" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Refika Fitria Gunawan</td>
                            <td>HMPS SI</td>
                            <td>Sekretaris HMPS SI</td>
                            <td>
                                <img src="" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jihan Ariska</td>
                            <td>HMPS SI</td>
                            <td>Bendahara HMPS SI</td>
                            <td>
                                <img src="" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@endsection