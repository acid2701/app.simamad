<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="home"><b>SIMAMAD</b></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="home"><b>PKU</b></a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i
                        class="fa-solid fa-house-chimney-window fa-lg"></i><span><b>Dashboard</b></span></a>
            </li>

            <li class="nav-item dropdown {{ 'dashboard' ?: '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fa-solid fa-briefcase fa-lg"></i><span><b>Absensi</b></span></a>
                <ul class="dropdown-menu">

                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('absen-apm.index') }}">Absensi Apm</a>
                    </li>

                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('absen-rekap.index') }}">Rekap Absen</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ 'dashboard' ?: '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fa-solid fa-calendar fa-lg"></i><span><b>Cuti</b></span></a>
                <ul class="dropdown-menu">

                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('cuti.create') }}">Create Cuti</a>
                    </li>

                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('cuti.index') }}">Rekap Cuti</a>
                    </li>

                </ul>
            </li>


            <li class="nav-item dropdown {{ 'dashboard' ?: '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fa-solid fa-money-bill-transfer fa-lg"></i><span><b>Keuangan</b></span></a>
                <ul class="dropdown-menu">

                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('gaji.index') }}">Slip Gaji</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ 'dashboard' ?: '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fa-solid fa-magnifying-glass-chart fa-lg"></i><span><b>Asset</b></span></a>
                <ul class="dropdown-menu">

                    <li class='{{ Request::is('#') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ route('asset-barcode.index') }}">Scan Asset</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('pakku.create') }}" class="nav-link"><i class="fa-solid fa-comments fa-lg"></i>
                    <span><b>Lapor Pakku</b></span></a>
            </li>



            <li class="nav-item dropdown {{ 'dashboard' ?: '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fa-solid fa-book-medical fa-lg"></i><span><b>Digilib</b></span></a>
                <ul class="dropdown-menu">

                    <li class="nav-item">
                        <a href="{{ asset('storage/digilib/PP-RSPKUA-periode-2025-2027.pdf') }}" class="nav-link" target="_blank">
                            <span><b>PP 2025-2027</b></span>
                        </a>
                    </li>

                </ul>
            </li>



            {{-- <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link"><i class="far fa-user"></i>
                    <span><b>Manajemen Users</b></span></a>
            </li> --}}



    </aside>
</div>
