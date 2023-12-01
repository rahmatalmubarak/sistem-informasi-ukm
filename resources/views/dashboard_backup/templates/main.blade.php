  @include('dashboard.templates.header')
  @include('dashboard.templates.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('dashboard.templates.navbar')
    <!-- End Navbar -->
    @yield('content')
  </main>
  @include('dashboard.templates.footer')
 