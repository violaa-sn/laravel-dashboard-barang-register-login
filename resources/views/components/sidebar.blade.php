<aside class="app-sidebar">

    {{-- Logo --}}
    <div class="sidebar-brand">

        <a href="{{ route('dashboard') }}" class="brand-link">

            <div class="brand-logo">

                <i class="bi bi-box-seam-fill"></i>

            </div>

            <div class="brand-text">

                <h5>Dashboard Barang</h5>

                <small>Inventory System</small>

            </div>

        </a>

    </div>

    {{-- Menu --}}
    <div class="sidebar-menu">

        <div class="menu-title">

            MAIN MENU

        </div>

        <a href="{{ route('dashboard') }}"
            class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2-fill"></i>

            <span>Dashboard</span>

        </a>

        <a href="{{ route('barang.index') }}"
            class="sidebar-item {{ request()->routeIs('barang.*') ? 'active' : '' }}">

            <i class="bi bi-box-seam"></i>

            <span>Barang</span>

        </a>

        <a href="{{ route('kategori.index') }}"
            class="sidebar-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}">

            <i class="bi bi-tags"></i>

            <span>Kategori</span>

        </a>

        <a href="{{ route('profile') }}"
            class="sidebar-item {{ request()->routeIs('profile') ? 'active' : '' }}">

            <i class="bi bi-person-circle"></i>

            <span>Profile</span>

        </a>

    </div>

    {{-- Footer Sidebar --}}
    <div class="sidebar-footer">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="btn btn-danger w-100 btn-app">

                <i class="bi bi-box-arrow-right me-2"></i>

                Logout

            </button>

        </form>

    </div>

</aside>