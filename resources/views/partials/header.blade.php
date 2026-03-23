<header class="navbar navbar-expand-md navbar-light d-print-none sticky-top">
    <div class="container-fluid">
        {{-- Hamburger: toggles offcanvas on mobile --}}
        <button class="navbar-toggler d-md-none" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" height="64" class="navbar-brand-image">
            <span class="ms-2 fw-bold">Uniscope</span>
        </a>

        {{-- User dropdown --}}
        <div class="navbar-nav flex-row order-md-last ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex align-items-center gap-2 p-0"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-sm bg-primary text-white rounded">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="d-none d-xl-flex flex-column lh-sm">
                        <span class="fw-medium">{{ Auth::user()->name }}</span>
                        <span class="text-muted small">Admin</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Profile</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</header>

{{-- Mobile Offcanvas Sidebar --}}
<div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar"
    style="width: 260px;">
    <div class="offcanvas-header py-1 border-bottom" style="min-height: 0;">
        <a href="." class="d-flex align-items-center text-decoration-none text-dark">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" 
                style="height: 56px; object-fit: contain;">
            <span class="ms-2 fw-semibold" style="font-size: 0.85rem;">Uniscope</span>
        </a>
        <button type="button" class="btn-close btn-close-sm" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body px-3 pt-2">
        @include('partials.sidebar-links')
    </div>
</div>