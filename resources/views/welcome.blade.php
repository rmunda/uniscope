<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School ERP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tabler CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet"/>
    
    <style>
        body {
            background: #f5f7fb;
        }
        .hero {
            height: 80vh;
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <header class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container-xl">
            
            {{-- Logo Left --}}
            <a href="/" class="navbar-brand">
                <strong>Uniscope</strong>
            </a>

            {{-- Right Side --}}
            <!-- <div class="navbar-nav flex-row order-md-last">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Login
                </a>
            </div> -->

        </div>
    </header>

    {{-- HERO SECTION --}}
    <div class="container-xl d-flex align-items-center justify-content-center hero">
        <div class="text-center">

            <h1 class="display-5 fw-bold mb-3">
                Manage Your School Efficiently
            </h1>

            <p class="lead text-muted mb-4">
                Admissions, Attendance, Fees, Exams — all in one place.
            </p>

            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                Get Started
            </a>

        </div>
    </div>

</body>
</html>