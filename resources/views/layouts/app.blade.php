<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-hidden">
    <div class="page">
        @include('partials.header')

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-2 d-none d-md-block">
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
</body>
</html>