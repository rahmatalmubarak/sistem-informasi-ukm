<!-- Main Sidebar Container -->
@php
    $segment = Request::segment(2);
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{Storage::url('public/img/assets/siomah.png')}}" alt="siomah" style="height: auto; width: 100%; display: block;">
    </a>
    {{-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (Auth::user()->role->id == 1)
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if ($segment == '') active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link @if ($segment == 'user') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelola User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ormawa.index') }}" class="nav-link @if ($segment == 'ormawa') active @endif">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Ormawa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('status_laporan.index') }}" class="nav-link @if ($segment == 'status-laporan') active @endif">
                        <i class="nav-icon fas fa-recycle"></i>
                        <p>
                            Status Laporan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kegiatan.index') }}" class="nav-link @if ($segment == 'kegiatan') active @endif">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Kegiatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('arsip.index') }}" class="nav-link @if ($segment == 'arsip') active @endif">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Arsip Dokumen
                        </p>
                    </a>
                </li>
               @else
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if ($segment == '') active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pendaftar.index') }}" class="nav-link @if ($segment == 'pendaftar') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelola Pendaftar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('postingan.index') }}" class="nav-link @if ($segment == 'postingan') active @endif">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Postingan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link @if ($segment == 'laporan') active @endif">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Pengajuan Laporan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kegiatan.ormawa.kegiatan', ['id' => Auth::user()->ormawa->id]) }}" class="nav-link @if ($segment == 'ormawa') active @endif">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Kelola Kegiatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('arsip.index') }}" class="nav-link @if ($segment == 'arsip') active @endif ">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Kelola Arsip Dokumen
                        </p>
                    </a>
                </li>
               @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>