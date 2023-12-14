<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="container">
        <ul class="navbar-nav">
            <img style="height: auto; width: 40%; display: block;" src="{{Storage::url('public/img/assets/panel-uinib.png')}}" alt="uinib">
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing_page') }}" role="button">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing_page.postingan-ormawa') }}" role="button">
                    Postingan
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing_page.ormawa') }}" role="button">
                    Ormawa
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link pl-1" data-toggle="dropdown" href="#ormawa">
                    <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#ormawa" class="dropdown-item">
                        @php
                            use App\Models\Ormawa;
                            $ormawa_list = Ormawa::all();
                        @endphp
                        @foreach ($ormawa_list as $ormawa)
                            <div class="media align-items-center">
                                <img src="{{Storage::url('public/img/assets/'. $ormawa->logo)}}" style="height: auto; width: 20%; display: block;" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing_page.pengurus') }}" role="button">
                    Pengurus
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landing_page.kontak') }}" role="button">
                    Kontak
                </a>
            </li>
            <li class="nav-item">
                <div class="col-9 ml-3 ">
                    <div class="input-group input-group-md" style="width: 150px; height: 50;">
                        <form class="d-flex" action="" method="get">
                            <input type="text" name="cari" class="form-control float-right" placeholder="Search"
                                value="{{old('cari')}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="btn btn-danger" href="{{ route('auth.login') }}">
                    Login
                </a>
            </li>
        </ul>
    </div>
</nav>