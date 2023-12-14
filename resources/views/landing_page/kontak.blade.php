@extends('landing_page.templates.main')

@section('title')
Kontak
@endsection

@section('content')
    <div class="row my-3">
        <div class="col-12 py-3">
            <div class="d-flex flex-column my-2">
                <h3 class="text-left text-bold">Hubungi Kami</h3>
            </div>
            <div class="col-12 d-flex">
                <div class="col-6 d-flex flex-column">
                    <p class="text-bold mb-0">Kontak : </p>
                    <div class="mt-3">
                        <div>
                            <i class="fas fa-user"></i> 
                            Fulan bin fulan
                            : 0821121999003
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <i class="fas fa-at"></i>
                            Email
                            : fulan@gmail.com
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <i class="fab fa-instagram-square"></i>
                            Instagram
                            : fulan123
                        </div>
                    </div>
                    <p class="text-bold mt-2">Kontak : </p>
                    <div class="mt-2">
                        <div>
                            <i class="fas fa-map-marker-alt"></i>
                            Jln. Bla bla bla bla
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex flex-column align-content-center align-items-center justify-content-center">
                    <div class="card col-12">
                        <div class="card-body">
                            <p>Tulis pesan anda di bawah ini!</p>
                            <form action="{{ route('landing_page.message') }}" method="post">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <label>Kritik</label>
                                    <textarea class="form-control" rows="3" name="kritik" placeholder="Kritik"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pesan</label>
                                    <textarea class="form-control" rows="3" name="pesan" placeholder="Pesan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Saran</label>
                                    <textarea class="form-control" rows="3" name="saran" placeholder="Saran"></textarea>
                                </div>                               
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-danger">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection