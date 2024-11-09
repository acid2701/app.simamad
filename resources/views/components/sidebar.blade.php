<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><b>SIMAMAD</b></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><b>PKU</b></a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item">
                <a href="home" class="nav-link"><i class="fas fa-fire"></i><span><b>Dashboard</b></span></a>
            </li>


            {{-- <li class="nav-item dropdown {{ 'dashboard' ?: '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="far fa-file-alt"></i><span><b>Pelaporan</b></span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('https://taplink.cc/casemanager') }}">Sistem Informasi
                            Layanan </a>
                    </li>
                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('https://taplink.cc/sidok') }}">Sistem Informasi Dokter</a>
                    </li>
                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('https://taplink.cc/karukoor') }}">E-Performa Koordinator</a>
                    </li>
                </ul>
            </li> --}}

{{--
            <li class="nav-item dropdown {{ 'dashboard' ?: '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-laptop-medical"></i><span><b>Vendor
                            (Testing)</b></span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('vendors.index') }}">Vendor</a>
                    </li>
                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('cvendors.index') }}">Kategori Vendor</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('kilats.index') }}" class="nav-link"><i class="fa-solid fa-comments"></i>
                    <span><b>Manajemen Kilats</b></span></a>
            </li>

            <li class="nav-item">
                <a href="{{ route('pakkus.index') }}" class="nav-link"><i class="fa-solid fa-comments"></i>
                    <span><b>Manajemen Pakku</b></span></a>
            </li> --}}

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link"><i class="far fa-user"></i>
                    <span><b>Manajemen Users</b></span></a>
            </li>



    </aside>
</div>
