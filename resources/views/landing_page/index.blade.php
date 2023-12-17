@extends('landing_page.templates.main')

@section('title')
Home
@endsection

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide"
                    src="{{Storage::url('public/img/assets/dashboard1.png')}}"
                    alt="First slide"
                    style="width: 100%; height: auto; object-fit: cover; top: -120px">
                {{-- <div class="container">
                    <div class="carousel-caption" style="bottom: 30%;">
                        <img src="{{Storage::url('public/img/assets/dema.png')}}" alt="dema fst">
                        <h3 class="text-bold mt-2">DEMA FST</h3>
                    </div>
                </div> --}}
            </div>
                <div class="carousel-item">
                <img class="second-slide"
                    src="{{Storage::url('public/img/assets/dashboard2.png')}}"
                    alt="second slide"
                    style="width: 100%; height: auto; object-fit: cover; top: -120px">
                {{-- <div class="container">
                    <div class="carousel-caption" style="bottom: 30%;">
                        <img src="{{Storage::url('public/img/assets/sema.png')}}" alt="sema fst">
                        <h3 class="text-bold mt-2">SEMA FST</h3>
                    </div>
                </div> --}}
            </div>
                    <div class="carousel-item">
                <img class="third-slide"
                    src="{{Storage::url('public/img/assets/dashboard3.png')}}"
                    alt="third slide"
                    style="width: 100%; height: auto; object-fit: cover; top: -120px">
                {{-- <div class="container">
                    <div class="carousel-caption" style="bottom: 30%;">
                        <img src="{{Storage::url('public/img/assets/mtk.png')}}" alt="hmps mtk">
                        <h3 class="text-bold mt-2">HMPS MTK</h3>
                    </div>
                </div> --}}
            </div>
                    <div class="carousel-item">
                <img class="third-slide"
                    src="{{Storage::url('public/img/assets/dashboard4.png')}}"
                    alt="third slide"
                    style="width: 100%; height: auto; object-fit: cover;">
                {{-- <div class="container">
                    <div class="carousel-caption" style="bottom: 30%;">
                        <img src="{{Storage::url('public/img/assets/hmpsi.png')}}" alt="hmps si">
                        <h3 class="text-bold mt-2">HMPS SI</h3>
                    </div>
                </div> --}}
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center text-center">
            <div class="col-4">
                <span class="text-bold">Kabar Terkini Seputar Organisasi Mahasiswa (ORMAWA) FST</span>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center mt-3 flex-wrap">
            @foreach ($berita_list as $berita)   
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"
                            alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;object-fit: cover;"
                            src="{{Storage::url('public/img/data/'.$berita->gambar)}}"
                            data-holder-rendered="true">
                        <div class="card-body">
                            <p class="card-text">{{$berita->judul}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <span>{{\Carbon\Carbon::parse($berita->tgl_post)->format('j F Y')}}</span>
                                </div>
                                <a href="{{ route('landing_page.read_postingan', ['id'=>$berita->id]) }}" class="btn btn-primary">></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12 d-flex bg-gray py-3">
            <div class="col-8">
                <h3 class="text-center text-bold">Pengumuman</h3>
                <div class="col-12 d-flex mt-3 flex-wrap">
                    @foreach ($pengumuman_list as $pengumuman)    
                        <div class="col-6" style="max-width: 50%; ">
                            <div class="small-box bg-info">
                                <div class="inner text-bold text-center" style="font-size: 20px">
                                    {{strtoupper($pengumuman->judul)}}
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('landing_page.open-recruitment', ['id'=>$pengumuman->ormawa->id]) }}" class="small-box-footer">Baca pengumuman <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-4 ml-1">
                <h3 class="text-center text-bold">Agenda</h3>
                <div class="col-12 d-flex mt-3 justify-content-center">
                    <div class="card card-widget shadow-sm" style="width: 100%">
                        <div class="card-footer p-0" >
                            <ul class="nav flex-column">
                                @foreach ($agenda_list as $agenda)
                                    <li class="nav-item">
                                        <div class="nav-link d-flex align-items-center py-0 px-0" style="color: black">
                                            <div class="col-3 d-flex flex-column text-sm align-items-center">
                                                <span>{{\Carbon\Carbon::parse($agenda->tgl_post)->format('j')}}</span>
                                                <span>{{\Carbon\Carbon::parse($agenda->tgl_post)->format('M Y')}}</span>
                                            </div>
                                            <span class="col-9 ml-2" style="width: 100%"><a href="{{ route('landing_page.read_postingan', ['id'=>$agenda->id]) }}">{{substr($agenda->judul, 0, 25)}}</a></span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12 py-3">
            <div class="d-flex flex-column my-2">
                <h3 class="text-center text-bold">Kontak</h3>
            </div>
            <div class="col-12 d-flex">
                <div class="col-6 d-flex align-content-center justify-content-center">
                    <i class="fas fa-id-card-alt text-gray" style="font-size: 150px"></i>
                </div>
                <div class="col-6 d-flex flex-column align-content-center align-items-center justify-content-center">
                    <div class="card col-8">
                        <div class="card-body">
                            <p>Tulis pesan anda di bawah ini!</p>
                            <form action="{{ route('landing_page.message') }}" method="post">
                                @method('POST')
                                @csrf
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control form-control-sm" name="kritik" id="kritik" placeholder="Kritik">
                                </div>
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control form-control-sm" name="pesan" id="pesan" placeholder="Pesan">
                                </div>
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control form-control-sm" name="saran" id="saran" placeholder="Saran">
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