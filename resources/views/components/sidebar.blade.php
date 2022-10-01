<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-moon"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Lunar Team</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::segment(1) == '' ? 'active' : ''}}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{Request::segment(1) == 'ganti_pelumas' ? 'active' : ''}}">
        <a class="nav-link" href="/ganti_pelumas">
            <i class="fas fa-fw fa-sync"></i>
            <span>Ganti Pelumas</span></a>
    </li>
    <li class="nav-item {{Request::segment(1) == 'cleaning' ? 'active' : ''}}">
        <a class="nav-link" href="/cleaning">
            <i class="fas fa-fw fa-broom"></i>
            <span>Cleaning</span></a>
    </li>
    <li class="nav-item {{Request::segment(1) == 'tightening' ? 'active' : ''}}">
        <a class="nav-link" href="/tightening">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tightening</span></a>
    </li>
    <li class="nav-item {{Request::segment(1) == 'petugas' ? 'active' : ''}}">
        <a class="nav-link" href="/petugas">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Petugas</span></a>
    </li>
    <li class="nav-item {{Request::segment(1) == 'pelumas' ? 'active' : ''}}">
        <a class="nav-link" href="/pelumas">
            <i class="fas fa-fw fa-tint"></i>
            <span>Data Pelumas</span></a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="/pelumas">
                    <i class="fas fa-fw fa-tint"></i>
                    <span>Data Pelumas</span></a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->