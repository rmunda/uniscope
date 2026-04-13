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
        <!-- <img src="{{ Vite::asset('resources/images/logo.png') }}" height="64" class="navbar-brand-image">  -->
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Space-Rocket-Earth--Streamline-Ultimate" height="24" width="24">
            <desc>
                Space Rocket Earth Streamline Icon: https://streamlinehq.com
            </desc>
            <path fill="#c2f3ff" d="M10.3139 21.547c4.0905 0 7.4066 -3.3161 7.4066 -7.4066 0 -4.0906 -3.3161 -7.4067 -7.4066 -7.4067 -4.09061 0 -7.40667 3.3161 -7.40667 7.4067 0 4.0905 3.31606 7.4066 7.40667 7.4066Z" stroke-width="1"></path>
            <path fill="#66e1ff" d="M14.8625 8.30196c0.6372 1.51026 0.7552 3.18934 0.3351 4.77384 -0.4199 1.5845 -1.354 2.9848 -2.6556 3.9811 -1.3016 0.9964 -2.89719 1.5325 -4.53637 1.5242 -1.63919 -0.0083 -3.22926 -0.5604 -4.52077 -1.5699 0.43774 1.0448 1.10931 1.9754 1.96306 2.7199 0.85375 0.7446 1.86692 1.2835 2.96158 1.5752 1.09465 0.2916 2.2416 0.3282 3.3526 0.107 1.111 -0.2211 2.1566 -0.6941 3.0561 -1.3828 0.8996 -0.6885 1.6292 -1.5742 2.1327 -2.589 0.5036 -1.0148 0.7677 -2.1316 0.7719 -3.2644 0.0043 -1.1328 -0.2513 -2.2515 -0.7473 -3.2701 -0.4958 -1.01849 -1.2187 -1.90971 -2.113 -2.60504Z" stroke-width="1"></path>
            <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M10.3139 21.547c4.0905 0 7.4066 -3.3161 7.4066 -7.4066 0 -4.0906 -3.3161 -7.4067 -7.4066 -7.4067 -4.09061 0 -7.40667 3.3161 -7.40667 7.4067 0 4.0905 3.31606 7.4066 7.40667 7.4066Z" stroke-width="1"></path>
            <path fill="#ffef5e" stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M16.1688 10.6681c-0.7712 0.4432 -1.5914 0.7948 -2.4442 1.0478 0.2529 -0.8527 0.6046 -1.673 1.0478 -2.44419 0.1863 -0.17989 0.4357 -0.27943 0.6946 -0.27718 0.259 0.00225 0.5067 0.10611 0.6898 0.28921 0.183 0.18311 0.2869 0.4308 0.2892 0.68972 0.0022 0.25894 -0.0974 0.50844 -0.2772 0.69464Z" stroke-width="1"></path>
            <path fill="#ffffff" stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M22.9603 2.743c0.1067 -0.24985 -0.0099 -0.36638 -0.2597 -0.25874l-1.5367 0.65771c-0.2946 0.13809 -0.5654 0.32172 -0.8028 0.54415l-1.3994 1.3964 -0.2212 -0.07407c-0.5662 -0.15513 -1.1622 -0.16572 -1.7334 -0.0308 -0.5713 0.13492 -1.0995 0.41105 -1.5364 0.80307l-0.3496 0.3486 1.3974 1.3964 1.3964 1.39641 1.3964 1.39447 0.3486 -0.34865c0.3921 -0.43689 0.6682 -0.96516 0.8031 -1.53643 0.1349 -0.57126 0.1243 -1.16725 -0.0308 -1.73337l-0.0741 -0.22121 1.3974 -1.39442c0.2221 -0.23742 0.4054 -0.50838 0.5431 -0.80288l0.6617 -1.53664Z" stroke-width="1"></path>
            <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M12.289 14.1493c-4.96446 4.9377 -9.89828 8.009 -11.04779 6.8595 -0.675497 -0.6765 0.10566 -2.6605 1.86943 -5.1906" stroke-width="1"></path>
            <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M17.5655 12.6235c0.3373 1.6202 0.1216 3.3066 -0.6125 4.7897 -0.7343 1.4831 -1.9447 2.6772 -3.4376 3.3912 -1.493 0.714 -3.1822 0.9066 -4.79763 0.5473 -1.61541 -0.3594 -3.06363 -1.2501 -4.11307 -2.5296 -1.04944 -1.2796 -1.63946 -2.8742 -1.67568 -4.5287 -0.03623 -1.6545 0.48342 -3.2734 1.47583 -4.59769 0.99242 -1.32431 2.40027 -2.27756 3.9984 -2.7073 1.59815 -0.42974 3.29415 -0.31114 4.81695 0.33684" stroke-width="1"></path>
        </svg>
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
            <!-- <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Uniscope Logo" class="mb-4" style="width: 150px; filter: brightness(0) invert(1);"> -->
             <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" id="Space-Rocket-Earth--Streamline-Ultimate" alt="Uniscope Logo" class="mb-4" style="width: 150px; filter: brightness(0) invert(1);">
                <desc>
                    Space Rocket Earth Streamline Icon: https://streamlinehq.com
                </desc>
                <path fill="#c2f3ff" d="M10.3139 21.547c4.0905 0 7.4066 -3.3161 7.4066 -7.4066 0 -4.0906 -3.3161 -7.4067 -7.4066 -7.4067 -4.09061 0 -7.40667 3.3161 -7.40667 7.4067 0 4.0905 3.31606 7.4066 7.40667 7.4066Z" stroke-width="1"></path>
                <path fill="#66e1ff" d="M14.8625 8.30196c0.6372 1.51026 0.7552 3.18934 0.3351 4.77384 -0.4199 1.5845 -1.354 2.9848 -2.6556 3.9811 -1.3016 0.9964 -2.89719 1.5325 -4.53637 1.5242 -1.63919 -0.0083 -3.22926 -0.5604 -4.52077 -1.5699 0.43774 1.0448 1.10931 1.9754 1.96306 2.7199 0.85375 0.7446 1.86692 1.2835 2.96158 1.5752 1.09465 0.2916 2.2416 0.3282 3.3526 0.107 1.111 -0.2211 2.1566 -0.6941 3.0561 -1.3828 0.8996 -0.6885 1.6292 -1.5742 2.1327 -2.589 0.5036 -1.0148 0.7677 -2.1316 0.7719 -3.2644 0.0043 -1.1328 -0.2513 -2.2515 -0.7473 -3.2701 -0.4958 -1.01849 -1.2187 -1.90971 -2.113 -2.60504Z" stroke-width="1"></path>
                <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M10.3139 21.547c4.0905 0 7.4066 -3.3161 7.4066 -7.4066 0 -4.0906 -3.3161 -7.4067 -7.4066 -7.4067 -4.09061 0 -7.40667 3.3161 -7.40667 7.4067 0 4.0905 3.31606 7.4066 7.40667 7.4066Z" stroke-width="1"></path>
                <path fill="#ffef5e" stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M16.1688 10.6681c-0.7712 0.4432 -1.5914 0.7948 -2.4442 1.0478 0.2529 -0.8527 0.6046 -1.673 1.0478 -2.44419 0.1863 -0.17989 0.4357 -0.27943 0.6946 -0.27718 0.259 0.00225 0.5067 0.10611 0.6898 0.28921 0.183 0.18311 0.2869 0.4308 0.2892 0.68972 0.0022 0.25894 -0.0974 0.50844 -0.2772 0.69464Z" stroke-width="1"></path>
                <path fill="#ffffff" stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M22.9603 2.743c0.1067 -0.24985 -0.0099 -0.36638 -0.2597 -0.25874l-1.5367 0.65771c-0.2946 0.13809 -0.5654 0.32172 -0.8028 0.54415l-1.3994 1.3964 -0.2212 -0.07407c-0.5662 -0.15513 -1.1622 -0.16572 -1.7334 -0.0308 -0.5713 0.13492 -1.0995 0.41105 -1.5364 0.80307l-0.3496 0.3486 1.3974 1.3964 1.3964 1.39641 1.3964 1.39447 0.3486 -0.34865c0.3921 -0.43689 0.6682 -0.96516 0.8031 -1.53643 0.1349 -0.57126 0.1243 -1.16725 -0.0308 -1.73337l-0.0741 -0.22121 1.3974 -1.39442c0.2221 -0.23742 0.4054 -0.50838 0.5431 -0.80288l0.6617 -1.53664Z" stroke-width="1"></path>
                <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M12.289 14.1493c-4.96446 4.9377 -9.89828 8.009 -11.04779 6.8595 -0.675497 -0.6765 0.10566 -2.6605 1.86943 -5.1906" stroke-width="1"></path>
                <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M17.5655 12.6235c0.3373 1.6202 0.1216 3.3066 -0.6125 4.7897 -0.7343 1.4831 -1.9447 2.6772 -3.4376 3.3912 -1.493 0.714 -3.1822 0.9066 -4.79763 0.5473 -1.61541 -0.3594 -3.06363 -1.2501 -4.11307 -2.5296 -1.04944 -1.2796 -1.63946 -2.8742 -1.67568 -4.5287 -0.03623 -1.6545 0.48342 -3.2734 1.47583 -4.59769 0.99242 -1.32431 2.40027 -2.27756 3.9984 -2.7073 1.59815 -0.42974 3.29415 -0.31114 4.81695 0.33684" stroke-width="1"></path>
            </svg>
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