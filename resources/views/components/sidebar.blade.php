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
        <div class="menu-title">MAIN MENU</div>

        <ul class="menu-list">
            <li>
                <a href="{{ route('dashboard') }}" class="sidebar-item">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('barang.index') }}" class="sidebar-item">
                    <i class="bi bi-box-seam"></i>
                    <span>Barang</span>
                </a>
            </li>

            <li>
                <a href="{{ route('kategori.index') }}" class="sidebar-item">
                    <i class="bi bi-tags"></i>
                    <span>Kategori</span>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('profile') || request()->routeIs('users.*') ? 'active' : '' }}">

                <a href="#" class="sidebar-item">
                    <i class="bi bi-person-circle"></i>

                    <span>User</span>

                    <i class="bi bi-chevron-down arrow"></i>
                </a>

                <ul class="submenu">

                    <li>
                        <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">
                            Account Detail
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('users.index') }}"
                            class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                            User Lists
                        </a>
                    </li>

                </ul>

            </li>
        </ul>
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