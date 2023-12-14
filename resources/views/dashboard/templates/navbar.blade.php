<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-blue navbar-light py-0">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-4">
        <li class="nav-item d-flex align-items-center dropdown show">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                <i class="far text-white fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            @php
                use App\Models\Message;
                $messages = Message::orderBy('id', 'desc')->paginate(5);
            @endphp
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                @foreach ($messages as $message)
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> {{substr($message->kritik, 0, 10)}}
                        <span class="float-right text-muted text-sm">{{$message->created_at}}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                @endforeach
            </div>
        </li>
        <li class="nav-item mr-2">
            <div class="user-panel d-flex align-items-center">
                <div class="image mr-2">
                    <img src="{{ asset('img/user2-160x160.jpg') }} " class="img-circle elevation-2" alt="User Image">
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