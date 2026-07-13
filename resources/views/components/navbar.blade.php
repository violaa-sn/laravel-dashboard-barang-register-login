<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top border-bottom">

    <div class="container-fluid px-4">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold text-primary fs-4" href="{{ route('dashboard') }}">
            <i class="bi bi-box-seam-fill me-2"></i>
            Dashboard Barang
        </a>

        {{-- Toggle Mobile --}}
        <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="navbar-collapse" id="navbarContent">

            {{-- Right Menu --}}
            <ul class="navbar-nav ms-auto align-items-center">

                {{-- Dropdown --}}
                <li class="nav-item dropdown">

                        <div class="d-none d-md-block text-start">

                            <div class="fw-semibold">

                                {{ Auth::user()->nama_user}}

                            </div>

                            <small class="text-muted">

                                {{ Auth::user()->email }}

                            </small>

                        </div>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ route('profile') }}">

                                <i class="bi bi-person me-2"></i>

                                Profile

                            </a>

                        </li>

                        <li>

                            <hr class="dropdown-divider">

                        </li>

                        <li>

                            <form action="{{ route('logout') }}" method="POST">

                                @csrf

                                <button
                                    class="dropdown-item text-danger">

                                    <i class="bi bi-box-arrow-right me-2"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>