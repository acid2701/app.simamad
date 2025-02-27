<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">

            </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">

        {{-- <li class="dropdown dropdown-list-toggle">
            <a href="#" id="toggle-theme" class="nav-link notification-toggle nav-link-lg">
                <i class="fa-regular fa-sun"></i>
            </a>
        </li> --}}

        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user d-flex justify-content-between align-items-center">

                <!-- Gambar Avatar (Kiri) -->
                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">

                <!-- Nama Karyawan (Tengah) -->
                <div class="d-sm-none d-lg-inline-block">Hello, {{ auth()->user()->karyawan->nama_karyawan ?? 'Guest' }}
                </div>


            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('profile.index') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>

                <a href="#" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>

                <a href="https://portal.rspkuboyolali.co.id" class="dropdown-item has-icon">
                    <i class="fas fa-solid fa-globe"></i> Portal
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item has-icon text-danger"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>


    </ul>
</nav>
