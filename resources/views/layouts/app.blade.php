<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Tabler already via Vite --}}
    
    {{-- DataTables CSS --}}
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        /* Tabler-style DataTables */

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
</head>
<body class="overflow-hidden">
    <div class="page">
        {{-- NAVBAR --}}
        @include('partials.header')

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-2 d-none d-md-block">
                        {{-- SIDEBAR --}}
                        @include('partials.sidebar')
                    </div>

                    <main class="col-md-10 " style="overflow-y: auto; height: calc(100vh - 56px); padding-right: 20px; background-color: #f6f8fb;">
                            {{-- PAGE HEADER --}}
                            @isset($header)
                                <div class="page-header d-print-none">                                    
                                    {{ $header }}                                    
                                </div>
                            @endisset
                        <div class="page-body">                       
                            {{ $slot }}
                        </div>
                    </main>
                </div>
            </div>

            @include('partials.footer')
        </div>
    </div>

{{-- FLASH TOAST --}}
<!-- <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
    
    @if(session('success'))
        <div class="toast align-items-center text-bg-success border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    @if(session('warning'))
        <div class="toast align-items-center text-bg-warning border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body text-dark">
                    {{ session('warning') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    @if(session('info'))
        <div class="toast align-items-center text-bg-info border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('info') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

</div> -->

{{-- ✅ GLOBAL TOAST CONTAINER --}}
<div class="toast-container position-fixed end-0 p-3" 
     style="top: 70px; z-index: 9999;">
</div>

{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- <script>
    $(document).ready(function () {
        $('.toast').each(function () {
            let toast = new bootstrap.Toast(this, {
                delay: 3000
            });
            toast.show();
        });
    });
</script> -->

{{-- ✅ UNIFIED TOAST FUNCTION --}}
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
    toastEl.className = `toast align-items-center border-0`;
    toastEl.role = 'alert';

    toastEl.style.backgroundColor = styles.bg;
    toastEl.style.color = styles.color;
    toastEl.style.borderLeft = `4px solid ${styles.border}`;

    toastEl.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">
                ${message}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;

    container.appendChild(toastEl);

    let toast = new bootstrap.Toast(toastEl, { delay: 4000 });
    toast.show();

    toastEl.addEventListener('hidden.bs.toast', () => {
        toastEl.remove();
    });
}
</script>

{{-- ✅ BLADE → JS FLASH MESSAGE BRIDGE --}}
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

{{-- ✅ OPTIONAL: GLOBAL AXIOS ERROR HANDLER --}}
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