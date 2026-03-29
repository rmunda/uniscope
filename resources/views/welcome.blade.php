<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .navbar-toggler { display: flex !important; }

        header.navbar { position: relative; }

        #navbar-menu {
            position: absolute;
            top: 100%;
            right: 1rem;
            min-width: 200px;
            background: var(--tblr-bg-surface, #fff);
            border: 1px solid var(--tblr-border-color, #e6e7e9);
            border-radius: var(--tblr-border-radius, 4px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            padding: 0.5rem 0;
            z-index: 1050;
        }

        #navbar-menu a.nav-link,
        #navbar-menu button.nav-link {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.55rem 1.25rem;
            color: var(--tblr-body-color, #232e3c);
            text-decoration: none;
            font-size: 0.875rem;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            white-space: nowrap;
            box-sizing: border-box;
        }

        #navbar-menu a.nav-link:hover,
        #navbar-menu button.nav-link:hover {
            background-color: var(--tblr-active-bg, #f1f5f9);
            color: var(--tblr-primary, #066fd1);
        }

        .nav-divider {
            border-top: 1px solid var(--tblr-border-color, #e6e7e9);
            margin: 0.25rem 0;
        }
    </style>
</head>
<body>

<header class="navbar d-print-none">
    <div class="container-xl w-100 d-flex align-items-center"
         x-data="{ open: false }"
         @click.outside="open = false">

        <!-- LOGO -->
        <img src="{{ Vite::asset('resources/images/logo.png') }}" height="64" class="navbar-brand-image"> 
        <a href="/" aria-label="tabler" class="navbar-brand navbar-brand-autodark me-auto">
          <strong>Uniscope</strong>
        </a>

        <!-- HAMBURGER BUTTON -->
        <button
            class="navbar-toggler"
            type="button"
            @click="open = !open"
            :aria-expanded="open"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- DROPDOWN MENU -->
        <div id="navbar-menu" x-show="open" x-transition>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="16" height="16"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0"/>
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/>
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/>
                        </svg>
                        Dashboard
                    </a>

                    <div class="nav-divider"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="16" height="16"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"/>
                                <path d="M9 12h12l-3 -3"/>
                                <path d="M18 15l3 -3"/>
                            </svg>
                            Logout
                        </button>
                    </form>

                @else
                    <a href="{{ route('login') }}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="16" height="16"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"/>
                            <path d="M20 12h-13l3 -3"/>
                            <path d="M10 15l-3 -3"/>
                        </svg>
                        Login
                    </a>

                    @if (Route::has('register'))
                        <div class="nav-divider"></div>
                        <a href="{{ route('register') }}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm" width="16" height="16"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                <path d="M16 19h6"/>
                                <path d="M19 16v6"/>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4"/>
                            </svg>
                            Register
                        </a>
                    @endif
                @endauth
            @endif

        </div>

    </div>
</header>
<section class="container-fluid p-0">
    <div class="row g-0" style="min-height: 80vh;">
        
        <div class="col-lg-5 bg-primary d-flex flex-column align-items-center justify-content-center text-white p-5">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Uniscope Logo" class="mb-4" style="width: 150px; filter: brightness(0) invert(1);">
            <h2 class="h1 fw-bold">Uniscope</h2>
            <p class="opacity-75">The future of school management.</p>
        </div>

        <div class="col-lg-7 d-flex align-items-center p-5">
            <div class="max-w-lg mx-auto">
                <span class="badge bg-primary-lt mb-3">Version 1.0 live</span>
                <h1 class="display-2 fw-bold mb-4">All-in-One School Management, Simplified</h1>
                <p class="text-muted fs-2 mb-5">
                    Uniscope helps you manage operations, stay organized, and create an inclusive environment—all from a single platform.
                </p>
                <div class="d-flex gap-3">
                    <!-- <a href="/register" class="btn btn-primary btn-lg">Get Started</a>-->
                    <a href="" class="btn btn-outline-primary btn-lg">Learn more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer footer-transparent d-print-none bg-light border-top py-5">
    <div class="container-xl px-0">
        
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dotted mb-0">
                    <li class="list-inline-item"><a href="#" class="link-secondary">Documentation</a></li>
                    <li class="list-inline-item"><a href="#" class="link-secondary">License</a></li>
                    <li class="list-inline-item"><a href="#" class="link-secondary">Source code</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <span class="text-secondary small">
                    Copyright &copy; 2026 <a href="." class="link-secondary fw-bold">Uniscope</a>. All rights reserved.
                </span>
            </div>
        </div>

        <hr class="my-4">

        <div class="row g-4 py-2">
            <div class="col-md-4 pe-md-5">
                <h4 class="fw-bold text-dark">Uniscope</h4>
                <p class="text-muted small lh-base">
                    Empowering schools with secure, intelligent, and user-friendly management solutions to streamline operations, enhance learning, and simplify administration.
                </p>
            </div>
            
            <div class="col-6 col-md-2">
                <h5 class="text-uppercase text-muted fw-bold mb-3 small">Product</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Features</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Pricing</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Security</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2">
                <h5 class="text-uppercase text-muted fw-bold mb-3 small">Legal</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Privacy Policy</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">Terms of Service</a></li>
                    <li class="mb-2"><a href="#" class="text-secondary text-decoration-none">GDPR</a></li>
                </ul>
            </div>
            
            <div class="col-md-4">
                <h5 class="text-uppercase text-muted fw-bold mb-3 small">Stay Connected</h5>
                <p class="small text-muted mb-3">Subscribe for school tech updates.</p>
                <div class="input-group input-group-flat">
                    <input type="email" class="form-control form-control-sm" placeholder="Email address">
                    <button class="btn btn-primary btn-sm" type="button">Join</button>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>