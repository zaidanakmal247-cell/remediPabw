<nav class="navbar" id="navbar">
    <div class="container nav-inner">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">🏠 Dashboard</a>
        <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">ℹ️ Tentang</a>
        <a href="{{ route('deteksi') }}" class="{{ request()->routeIs('deteksi') || request()->routeIs('deteksi.proses') ? 'active' : '' }}">📷 Input Deteksi</a>
        <a href="{{ route('riwayat') }}" class="{{ request()->routeIs('riwayat') ? 'active' : '' }}">📋 Riwayat Deteksi</a>
    </div>
</nav>
