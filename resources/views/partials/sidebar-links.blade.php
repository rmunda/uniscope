{{-- MAIN --}}
<p class="sidebar-section-title">MAIN</p>

<ul class="nav flex-column sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
           href="{{ route('dashboard') }}">
            <span class="sidebar-icon svg-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="App-Window-Pie-Chart--Streamline-Ultimate">
                    <desc>
                        App Window Pie Chart Streamline Icon: https://streamlinehq.com
                    </desc>
                    <path fill="#66e1ff" d="M23 7.21548V19.6503c0 0.5073 -0.2015 0.9939 -0.5603 1.3527s-0.8454 0.5603 -1.3527 0.5603H2.91304c-0.50736 0 -0.99396 -0.2015 -1.35272 -0.5603C1.20155 20.6442 1 20.1576 1 19.6503V7.21548h22Z" stroke-width="1"></path>
                    <path fill="#c2f3ff" d="M2.91304 21.5633h1.91305L19.1739 7.21548H1V19.6503c0 0.5073 0.20155 0.9939 0.56032 1.3527 0.35876 0.3588 0.84536 0.5603 1.35272 0.5603Z" stroke-width="1"></path>
                    <path fill="#78eb7b" d="M12.9564 14.3893c0.0007 -0.778 -0.1888 -1.5445 -0.5519 -2.2326 -0.3631 -0.6882 -0.8888 -1.2772 -1.5314 -1.7159l-2.69927 3.9485 3.06567 3.6702c0.5379 -0.4483 0.9707 -1.0095 1.2675 -1.6437 0.2967 -0.6344 0.4501 -1.3261 0.4494 -2.0265Z" stroke-width="1"></path>
                    <path fill="#ffbfc5" d="M10.873 10.4409c-0.7185 -0.49129 -1.55753 -0.77716 -2.42655 -0.82679 -0.86902 -0.04964 -1.73512 0.13883 -2.50493 0.54509 -0.76982 0.4063 -1.41416 1.0149 -1.8636 1.7604 -0.44943 0.7454 -0.68689 1.5994 -0.68681 2.4698h4.78261l2.69928 -3.9485Z" stroke-width="1"></path>
                    <path fill="#ffef5e" d="M3.39111 14.3894c0.00013 0.9094 0.25953 1.7999 0.74777 2.5671 0.48825 0.7672 1.18512 1.3793 2.00888 1.7645 0.82377 0.3853 1.74029 0.5276 2.6421 0.4105 0.9018 -0.1171 1.75154 -0.489 2.44954 -1.0719l-3.06568 -3.6702H3.39111Z" stroke-width="1"></path>
                    <path fill="#ffffff" d="M23 6.73723H1V3.86766c0 -0.50736 0.20155 -0.99396 0.56032 -1.35272 0.35876 -0.35877 0.84536 -0.56032 1.35272 -0.56032H21.087c0.5073 0 0.9939 0.20155 1.3527 0.56032 0.3588 0.35876 0.5603 0.84536 0.5603 1.35272v2.86957Z" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M21.087 1.95831H2.91304C1.8565 1.95831 1 2.81481 1 3.87136V20.1322c0 1.0566 0.8565 1.913 1.91304 1.913H21.087c1.0565 0 1.913 -0.8564 1.913 -1.913V3.87136c0 -1.05655 -0.8565 -1.91305 -1.913 -1.91305Z" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M1 6.74109h22" stroke-width="1"></path>
                    <path stroke="#191919" d="M10.0868 4.58504c-0.13208 0 -0.23914 -0.10706 -0.23914 -0.23913 0 -0.13207 0.10706 -0.23913 0.23914 -0.23913" stroke-width="1"></path>
                    <path stroke="#191919" d="M10.0864 4.58504c0.1321 0 0.2392 -0.10706 0.2392 -0.23913 0 -0.13207 -0.1071 -0.23913 -0.2392 -0.23913" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M8.17372 19.1758c2.64138 0 4.78258 -2.1411 4.78258 -4.7826 0 -2.6413 -2.1412 -4.78254 -4.78258 -4.78254 -2.64136 0 -4.78261 2.14124 -4.78261 4.78254 0 2.6415 2.14125 4.7826 4.78261 4.7826Z" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="m10.8722 10.4447 -2.69837 3.9485 3.06567 3.6702" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M8.17372 14.3932H3.39111" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M14.8696 10.5671h5.7392" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M14.8696 13.4367h5.7392" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M14.8696 16.3063h5.7392" stroke-width="1"></path>
                    <path stroke="#191919" d="M4.34753 4.58892c-0.13207 0 -0.23913 -0.10707 -0.23913 -0.23913 0 -0.13207 0.10706 -0.23913 0.23913 -0.23913" stroke-width="1"></path>
                    <path stroke="#191919" d="M4.34766 4.58892c0.13206 0 0.23913 -0.10707 0.23913 -0.23913 0 -0.13207 -0.10707 -0.23913 -0.23913 -0.23913" stroke-width="1"></path>
                    <path stroke="#191919" d="M7.21716 4.59276c-0.13207 0 -0.23913 -0.10706 -0.23913 -0.23913 0 -0.13206 0.10706 -0.23913 0.23913 -0.23913" stroke-width="1"></path>
                    <path stroke="#191919" d="M7.21729 4.59276c0.13206 0 0.23913 -0.10706 0.23913 -0.23913 0 -0.13206 -0.10707 -0.23913 -0.23913 -0.23913" stroke-width="1"></path>
                    </svg>
            </span>
            Dashboard
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}" href="#">
            <span class="sidebar-icon svg-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Single-Neutral-Circle--Streamline-Ultimate" height="24" width="24">
                    <desc>
                        Single Neutral Circle Streamline Icon: https://streamlinehq.com
                    </desc>
                    <path fill="#c2f3ff" d="M12.0001 23c6.0733 0 10.9972 -4.9239 10.9972 -10.9972 0 -6.07331 -4.9239 -10.99718 -10.9972 -10.99718 -6.07329 0 -10.99717 4.92387 -10.99717 10.99718C1.00293 18.0761 5.92681 23 12.0001 23Z" stroke-width="1"></path>
                    <path fill="#66e1ff" d="M12.0001 5.55652c2.5213 0.00022 4.9658 0.86676 6.9244 2.45446 1.9585 1.5877 3.312 3.80012 3.8338 6.26682 0.3396 -1.6021 0.3171 -3.2599 -0.0659 -4.85222s-1.1167 -3.079 -2.1477 -4.35147c-1.031 -1.27248 -2.3332 -2.29861 -3.8115 -3.00347C15.2549 1.36579 13.6379 1 12.0001 1c-1.6377 0 -3.25475 0.36579 -4.73303 1.07064 -1.47829 0.70486 -2.78048 1.73099 -3.81148 3.00347 -1.031 1.27247 -1.76478 2.75915 -2.14776 4.35147C0.924863 11.0179 0.902371 12.6757 1.242 14.2778c0.52178 -2.4667 1.87528 -4.67912 3.8338 -6.26682 1.95851 -1.5877 4.4031 -2.45424 6.9243 -2.45446Z" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M12.0001 23c6.0733 0 10.9972 -4.9239 10.9972 -10.9972 0 -6.07331 -4.9239 -10.99718 -10.9972 -10.99718 -6.07329 0 -10.99717 4.92387 -10.99717 10.99718C1.00293 18.0761 5.92681 23 12.0001 23Z" stroke-width="1"></path>
                    <path fill="#ffdda1" d="M12.0005 9.61208c0.8242 0 1.6148 -0.32744 2.1976 -0.91029 0.5828 -0.58284 0.9103 -1.37335 0.9103 -2.19762 0 -0.82426 -0.3275 -1.61477 -0.9103 -2.19762 -0.5828 -0.58284 -1.3734 -0.91028 -2.1976 -0.91028 -0.8243 0 -1.6148 0.32744 -2.19764 0.91028 -0.58284 0.58285 -0.91028 1.37336 -0.91028 2.19762 0 0.82427 0.32744 1.61478 0.91028 2.19762 0.58284 0.58285 1.37334 0.91029 2.19764 0.91029Z" stroke-width="1"></path>
                    <path fill="#ffffff" d="m13.9561 20.6093 0.4351 -2.3907h1.9126v-2.8688c0 -1.1413 -0.4534 -2.2359 -1.2604 -3.0429 -0.807 -0.807 -1.9016 -1.2604 -3.0429 -1.2604s-2.23583 0.4534 -3.04284 1.2604c-0.80702 0.807 -1.26039 1.9016 -1.26039 3.0429v2.8688h1.91255l0.43508 2.3907" stroke-width="1"></path>
                    <path fill="#ffdda1" d="M12.0005 5.30883c0.655 0.00133 1.2927 0.21033 1.8214 0.59694s0.9212 0.93093 1.121 1.55468c0.1052 -0.30792 0.1617 -0.63114 0.1655 -0.95628 0 -0.82426 -0.3275 -1.61477 -0.9103 -2.19762 -0.5828 -0.58284 -1.3734 -0.91028 -2.1976 -0.91028 -0.8243 0 -1.6148 0.32744 -2.19764 0.91028 -0.58284 0.58285 -0.91028 1.37336 -0.91028 2.19762 0.00382 0.32514 0.06024 0.64836 0.16543 0.95628 0.19986 -0.62375 0.59236 -1.16807 1.12109 -1.55468 0.5287 -0.38661 1.1664 -0.59561 1.8214 -0.59694Z" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M12.0005 9.61208c0.8242 0 1.6148 -0.32744 2.1976 -0.91029 0.5828 -0.58284 0.9103 -1.37335 0.9103 -2.19762 0 -0.82426 -0.3275 -1.61477 -0.9103 -2.19762 -0.5828 -0.58284 -1.3734 -0.91028 -2.1976 -0.91028 -0.8243 0 -1.6148 0.32744 -2.19764 0.91028 -0.58284 0.58285 -0.91028 1.37336 -0.91028 2.19762 0 0.82427 0.32744 1.61478 0.91028 2.19762 0.58284 0.58285 1.37334 0.91029 2.19764 0.91029Z" stroke-width="1"></path>
                    <path fill="#ffffff" d="M12.0005 11.0465c-1.1413 0 -2.23583 0.4534 -3.04284 1.2604 -0.80702 0.807 -1.26039 1.9016 -1.26039 3.0429v1.9125c0 -0.5651 0.1113 -1.1247 0.32756 -1.6468s0.53324 -0.9964 0.93283 -1.396c0.39959 -0.3996 0.87398 -0.7166 1.39604 -0.9329 0.5221 -0.2162 1.0817 -0.3275 1.6468 -0.3275 0.5651 0 1.1247 0.1113 1.6468 0.3275 0.5221 0.2163 0.9965 0.5333 1.3961 0.9329 0.3996 0.3996 0.7165 0.8739 0.9328 1.396 0.2163 0.5221 0.3276 1.0817 0.3276 1.6468v-1.9125c0 -1.1413 -0.4534 -2.2359 -1.2604 -3.0429 -0.807 -0.807 -1.9016 -1.2604 -3.0429 -1.2604Z" stroke-width="1"></path>
                    <path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="m13.9561 20.6093 0.4351 -2.3907h1.9126v-2.8688c0 -1.1413 -0.4534 -2.2359 -1.2604 -3.0429 -0.807 -0.807 -1.9016 -1.2604 -3.0429 -1.2604s-2.23583 0.4534 -3.04284 1.2604c-0.80702 0.807 -1.26039 1.9016 -1.26039 3.0429v2.8688h1.91255l0.43508 2.3907" stroke-width="1"></path>
                </svg>
            </span>
            Students
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}" href="#">
            <span class="sidebar-icon svg-lg">
                <img src="{{ Vite::asset('resources/images/teacher.png') }}">
            </span>
            Teachers
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link d-flex justify-content-between align-items-center"
           data-bs-toggle="collapse"
           href="#examsMenu">

            <div class="d-flex align-items-center gap-2">
                <span class="sidebar-icon svg-lg">
                    <img src="{{ Vite::asset('resources/images/grades.png') }}">
                </span>
                Exams / Grades
            </div>

            <span style="font-size: 12px;">▾</span>
        </a>

        <div class="collapse sidebar-submenu {{ request()->routeIs('admin.exams.*') || request()->routeIs('admin.grades.*') ? 'show' : '' }}"
             id="examsMenu">

            <ul class="nav flex-column ms-4 mt-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">All Exams</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Grades</a>
                </li>
            </ul>

        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.classes.*') ? 'active' : '' }}" href="#">
            <span class="sidebar-icon svg-lg">
                <img src="{{ Vite::asset('resources/images/class.png') }}">
            </span>
            Class
        </a>
    </li>

</ul>

<!-- <hr class="mx-3"> -->

{{-- SETTINGS --}}
<p class="sidebar-section-title">ADMIN</p>

<ul class="nav flex-column sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.academic.settings') ? 'active' : '' }}"
           href="{{ route('admin.academic.settings') }}">
            <span class="sidebar-icon svg-lg">
                <img src="{{ Vite::asset('resources/images/settings.png') }}">
            </span>
            Configure
        </a>
    </li>

</ul>