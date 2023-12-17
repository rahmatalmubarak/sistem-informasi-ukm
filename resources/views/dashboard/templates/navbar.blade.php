<!-- Navbar -->
@php
    use App\Models\Message;
    $messages = Message::where('is_read', 0)->get();
@endphp
<nav class="main-header navbar navbar-expand navbar-blue navbar-light py-0">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-4">
        @if (Auth::user()->role->id == 2)
        <li class="nav-item d-flex align-items-center dropdown ">
            <a class="nav-link" href="{{ route('pesan.index') }}" >
                <i class="far text-white fa-bell"></i>
                @if ($messages->count() > 0)
                    <span class="badge badge-warning navbar-badge">{{$messages->count()}}</span>
                @endif
            </a>
            {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                @if ($messages->count() > 0)
                <span class="dropdown-item dropdown-header">{{$messages->count()}} notifikasi</span>
                @else
                <span class="dropdown-item dropdown-header">Tidak ada notifikasi</span>
                @endif
                <div class="dropdown-divider"></div>
                @foreach ($messages as $message)
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> {{substr($message->kritik, 0, 10)}}
                        <span class="float-right text-muted text-sm">{{$message->created_at}}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                @endforeach
            </div> --}}
        </li>
        @endif
        <li class="nav-item mr-2">
            <div class="user-panel d-flex align-items-center">
                <div class="image mr-2">
                    @if(Auth::user()->role->id == 1)
                    <img src="{{ asset('img/logo-uinib.png') }} " class="img-circle elevation-2" alt="Super Admin">
                    @else
                    <img src="{{ Storage::url('public/img/data/'.Auth::user()->ormawa->logo) }} " class="bg-white img-circle elevation-2" alt="Admin">
                    @endif
                </div>
                <div class="info">
                    <span class="text-sm">Halo, </span>
                    @if(Auth::user()->role->id == 1)
                    <span class="text-sm d-block">{{Auth::user()->role->nama}}</span>
                    @else
                    <span class="text-sm d-block">{{Auth::user()->role->nama}} {{Auth::user()->ormawa->nama}}</span>
                    @endif
                </div>
            </div>
        </li>
        <li class="nav-item d-flex align-items-center">
            <div class="p-1">
                <a class="text-lg text-white" href="{{ route('auth.logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->