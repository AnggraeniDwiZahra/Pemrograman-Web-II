<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #0c0c0e;
            font-family: 'Poppins', sans-serif;
            color: #bcbcbc;
        }

        .text-maroon-neon {
            color: #ff3355;
        }
        
        .border-maroon-neon {
            border-color: #ff3355 !important;
            box-shadow: 0 0 20px rgba(255, 51, 85, 0.2);
        }

        .btn-maroon-neon {
            background-color: #ff3355;
            color: #ffffff;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 500;
            transition: 0.3s;
            border: none;
        }
        .btn-maroon-neon:hover {
            background-color: #d62242;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .btn-outline-custom {
            background-color: transparent;
            color: #ffffff;
            border: 2px solid #333335;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 500;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-outline-custom:hover {
            border-color: #ff3355;
            color: #ffffff;
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
        }
        .navbar-custom .nav-link {
            font-weight: 500;
            color: #88888b;
            transition: 0.3s;
        }
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #ffffff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark navbar-custom py-4">
        <div class="container">
            <a class="navbar-brand text-maroon-neon fw-bold fs-3" href="{{ route('home') }}">Renz</a>
            <div class="navbar-nav ms-auto gap-3">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
                <a class="nav-link {{ Request::is('experience') ? 'active' : '' }}" href="{{ route('experience') }}">Experience</a>
                <a class="nav-link" href="https://www.linkedin.com/in/anggraeni-dwi-zahra?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">Contact</a>
            </div>
        </div>
    </nav>

    <main style="min-height: 75vh;" class="d-flex align-items-center">
        @yield('content')
    </main>

    <footer class="py-5 text-center small" style="color: #444446; border-top: 1px solid #16161a;">
        <div class="container">
            <p class="mb-0">© 2026. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>