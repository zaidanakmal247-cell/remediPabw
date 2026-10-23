<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'AgriVision Garut')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">🌿</span>
                <span>AgriVision Kabupaten Garut</span>
            </a>
            <button class="nav-toggle" id="navToggle" aria-label="Buka menu">☰</button>
        </div>
        @include('partials.navbar')
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <p>© 2026 AgriVision – Kelompok Tani Makmur Kabupaten Garut</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
