@php
    $segment = Request::segment(1);
    $segment_ormawa = Request::segment(2);
    @endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="container">
        <ul class="navbar-nav">
            <img style="height: auto; width: 40%; display: block;" src="{{Storage::url('public/img/assets/Fakultas Sains dan Teknologi logo.png')}}" alt="uinib">
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item @if ($segment == 'home') active @endif">
                <a class="nav-link" href="{{ route('landing_page') }}" role="button">
                    Home
                </a>
            </li>
            <li class="nav-item @if ($segment == 'postingan') active @endif">
                <a class="nav-link" href="{{ route('landing_page.postingan-ormawa') }}" role="button">
                    Postingan
                </a>
            </li>

            <li class="nav-item @if ($segment == 'ormawa') active @endif">
                <a class="nav-link" href="{{ route('landing_page.ormawa') }}" role="button">
                    Ormawa
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link pl-1" data-toggle="dropdown" href="#">
                    <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    @php
                        use App\Models\Ormawa;
                        $ormawa_list = Ormawa::all();
                    @endphp
                    @foreach ($ormawa_list as $ormawa)
                    <a href="{{ route('landing_page.detail_ormawa', ['slug'=>str_replace(' ', '-', $ormawa->nama)]) }}" class="dropdown-item @if ($segment_ormawa == str_replace(' ', '-', $ormawa->nama)) active @endif">
                            <div class="media align-items-center">
                                <img src="{{Storage::url('public/img/data/'. $ormawa->logo)}}" style="height: auto; width: 20%; display: block;" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{$ormawa->nama}}
                                    </h3>
                                </div>
                            </div>  
                        @endforeach
                    </a>
                </div>
            </li>
            <li class="nav-item @if ($segment == 'pengurus') active @endif">
                <a class="nav-link" href="{{ route('landing_page.pengurus') }}" role="button">
                    Pengurus
                </a>
            </li>
            <li class="nav-item @if ($segment == 'kontak') active @endif">
                <a class="nav-link" href="{{ route('landing_page.kontak') }}" role="button">
                    Kontak
                </a>
            </li>
            <li class="nav-item">
                <div class="col-9 ml-3 ">
                    <div class="input-group input-group-md">
                        <button type="button" class="btn btn-white" data-toggle="modal" data-target="#search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

            </li>
            <li class="nav-item">
                <a class="btn btn-danger" href="{{ route('auth.login') }}">
                    @if (Auth::user())
                        Dashboard
                    @else
                        Login
                    @endif
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="modal fade" id="search" style="padding-top: 10%">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="d-flex" action="{{ route('landing_page.postingan.cari') }}" method="get">
                        <input type="text" name="cari" class="form-control float-right" placeholder="Search" value="{{old('cari')}}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>