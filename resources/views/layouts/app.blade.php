<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- DataTables CSS --}}
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        .dataTables_filter input {
            border: 1px solid #dadcdf;
            border-radius: 6px;
            padding: 6px 10px;
            font-size: 14px;
            margin-left: 6px;
        }

        .dataTables_length select {
            border: 1px solid #dadcdf;
            border-radius: 6px;
            padding: 4px 8px;
        }

        .dataTables_paginate .page-item .page-link {
            border-radius: 6px;
            margin: 0 2px;
        }

        .dataTables_paginate .page-item.active .page-link {
            background-color: var(--tblr-primary);
            border-color: var(--tblr-primary);
            color: #fff;
        }

        .dataTables_info {
            font-size: 14px;
            color: #6c757d;
        }

        .dataTables_wrapper .row {
            align-items: center;
        }
    </style>

    @stack('styles')
</head>

<body>
<div class="page">
<div class="page-wrapper">
<div class="container-fluid p-0">
<div class="row g-0">

    {{-- DESKTOP SIDEBAR --}}
    <aside class="col-md-2 d-none d-md-block border-end"
           style="position: sticky; top: 0; height: 100vh; background: #ffffff;">
        @include('partials.sidebar')
    </aside>

    {{-- MOBILE OFFCANVAS SIDEBAR --}}
    <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar"
         style="width: 260px;">
        <div class="offcanvas-body p-0">
            @include('partials.sidebar')
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <main class="col-md-10 col-12 pt-0 mb-0"
          style="overflow-y: auto; height: 100vh; background-color: #f6f8fb;">

        {{-- MOBILE TOPBAR --}}
        <div class="d-flex d-md-none align-items-center px-3 py-2 border-bottom bg-white">
            <button class="btn btn-sm btn-outline-secondary" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                </svg>
            </button>
            <span class="ms-3 fw-bold">Uniscope</span>
        </div>

        {{-- PAGE HEADER --}}
        @isset($header)
            <div class="page-header d-print-none">
                {{ $header }}
            </div>
        @endisset

        {{-- PAGE CONTENT --}}
        <div class="page-body">
            {{ $slot }}
        </div>

    </main>

</div>
</div>
</div>
</div>

{{-- TOAST CONTAINER --}}
<div class="toast-container position-fixed end-0 p-3"
     style="top: 16px; z-index: 9999; display: flex; flex-direction: column; gap: 4px;">
</div>

{{-- JS (UNCHANGED) --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

{{-- TOAST FUNCTION --}}
<script>
    function showToast(type, message) {
        let container = document.querySelector('.toast-container');

        let styles = {
            success: {
                bg: 'var(--tblr-success-lt)',
                color: 'var(--tblr-success)',
                border: 'var(--tblr-success)'
            },
            error: {
                bg: 'var(--tblr-danger-lt)',
                color: 'var(--tblr-danger)',
                border: 'var(--tblr-danger)'
            },
            warning: {
                bg: 'var(--tblr-warning-lt)',
                color: 'var(--tblr-warning)',
                border: 'var(--tblr-warning)'
            },
            info: {
                bg: 'var(--tblr-primary-lt)',
                color: 'var(--tblr-primary)',
                border: 'var(--tblr-primary)'
            }
        }[type];

        let toastEl = document.createElement('div');
        toastEl.className = 'toast align-items-center border-0 show';
        toastEl.role = 'alert';
        toastEl.style.backgroundColor = styles.bg;
        toastEl.style.color = styles.color;
        toastEl.style.borderLeft = `4px solid ${styles.border}`;
        toastEl.style.marginBottom = '5px';

        toastEl.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;

        container.prepend(toastEl);
        setTimeout(() => toastEl.remove(), 3000);
        toastEl.querySelector('.btn-close').onclick = () => toastEl.remove();
    }
</script>

{{-- BLADE FLASH MESSAGE BRIDGE --}}
<script>
    @if(session('success'))
        showToast('success', "{{ session('success') }}");
    @endif

    @if(session('error'))
        showToast('error', "{{ session('error') }}");
    @endif

    @if(session('warning'))
        showToast('warning', "{{ session('warning') }}");
    @endif

    @if(session('info'))
        showToast('info', "{{ session('info') }}");
    @endif
</script>

{{-- AXIOS ERROR HANDLER --}}
<script>
    if (window.axios) {
        axios.interceptors.response.use(
            response => response,
            error => {
                let message = 'Something went wrong!';
                if (error.response?.data?.message) {
                    message = error.response.data.message;
                }
                showToast('error', message);
                return Promise.reject(error);
            }
        );
    }
</script>

@stack('scripts')

</body>
</html>