<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link {{ request()->is('barang*') ? 'active' : '' }}"
                   href="{{ route('barang.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    Barang
                </a>

                <a class="nav-link {{ request()->is('anggota*') ? 'active' : '' }}"
                   href="{{ route('anggota.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    Anggota
                </a>

                <a class="nav-link {{ request()->is('supplier*') ? 'active' : '' }}"
                   href="{{ route('supplier.index') }}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    Supplier
                </a>

            </div>
        </div>
    </nav>
</div>
