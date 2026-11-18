<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'SIKAP Sawit - Sistem Informasi K3')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <!-- NAVBAR ATAS -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5 font-weight-bold text-success" href="{{ route('dashboard') }}">
          SIKAP SAWIT
        </a>
        <a class="navbar-brand brand-logo-mini font-weight-bold text-success" href="{{ route('dashboard') }}">
          K3
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          @auth
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-toggle="dropdown" id="profileDropdown">
              <div class="text-right mr-2 d-none d-md-block">
                <span class="d-block text-dark font-weight-bold" style="line-height: 1.2;">{{ Auth::user()->name }}</span>
                <small class="text-muted text-uppercase">{{ Auth::user()->role }}</small>
              </div>
              <img src="{{ asset('images/faces/face28.jpg') }}" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-header text-center">
                <p class="mb-1 font-weight-semibold">{{ Auth::user()->name }}</p>
                <p class="font-weight-light text-muted mb-0 small">{{ Auth::user()->email }}</p>
              </div>
              <div class="dropdown-divider"></div>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-danger font-weight-bold">
                  <i class="ti-power-off text-danger mr-2"></i> Keluar (Logout)
                </button>
              </form>
            </div>
          </li>
          @endauth
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <!-- CONTAINER UTAMA -->
    <div class="container-fluid page-body-wrapper">
      <!-- SIDEBAR KIRI -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard K3</span>
            </a>
          </li>

          <li class="nav-item {{ request()->is('pre-work*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pre-work.index') }}">
              <i class="icon-check menu-icon"></i>
              <span class="menu-title">Pre-Work Check</span>
            </a>
          </li>

          <li class="nav-item {{ request()->is('laporan-bahaya*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('laporan-bahaya.index') }}">
              <i class="icon-bell menu-icon"></i>
              <span class="menu-title">Laporan Bahaya</span>
            </a>
          </li>

          <li class="nav-item {{ request()->is('perlengkapan*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('perlengkapan.index') }}">
              <i class="icon-briefcase menu-icon"></i>
              <span class="menu-title">Perlengkapan & APD</span>
            </a>
          </li>

          <li class="nav-item {{ request()->is('edukasi*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/edukasi') }}">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Modul Edukasi K3</span>
            </a>
          </li>

          @if(Auth::check() && Auth::user()->role === 'admin')
          <li class="nav-item {{ request()->is('blok-kerja*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/blok-kerja') }}">
              <i class="icon-map menu-icon"></i>
              <span class="menu-title">Data Blok Kerja</span>
            </a>
          </li>
          @endif
        </ul>
      </nav>

      <!-- AREA KONTEN HALAMAN -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>

        <!-- FOOTER -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">SIKAP Sawit — Sistem Informasi K3 Perkebunan Kelapa Sawit © 2026</span>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
</body>

</html>