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
                    <main class="col-md-10" style="overflow-y: auto; height: calc(100vh - 56px);">
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
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
    
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

</div>
{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('.toast').each(function () {
            let toast = new bootstrap.Toast(this, {
                delay: 3000
            });
            toast.show();
        });
    });
</script>

@stack('scripts')

</body>
</html>