@extends('layouts.main')

@section('title', 'Dashboard – AgriVision Garut')

@section('content')
<section class="hero">
    <span class="pill">🌾 Prototipe Sistem Pencatatan Hama</span>
    <h1>Selamat Datang di AgriVision Garut – Sistem Deteksi Hama Tanaman Berbasis Computer Vision</h1>
    <p>Catat hasil prediksi model, pantau status serangan hama, dan dapatkan rekomendasi penanganan untuk lahan pertanian Kabupaten Garut.</p>
    <div class="hero-actions">
        <a class="btn btn-primary" href="{{ route('deteksi') }}">Mulai Input Deteksi</a>
        <a class="btn btn-light" href="{{ route('riwayat') }}">Lihat Riwayat</a>
    </div>
</section>

<section class="grid grid-4 reveal">
    <div class="stat"><strong data-count="3">0</strong><span>Kecamatan Pantauan</span></div>
    <div class="stat"><strong data-count="3">0</strong><span>Jenis Hama Utama</span></div>
    <div class="stat"><strong data-count="3">0</strong><span>Kategori Status</span></div>
    <div class="stat"><strong>B0</strong><span>EfficientNet</span></div>
</section>

<section class="grid grid-3 reveal">
    <article class="card">
        <div class="icon">🎯</div>
        <h3>Tujuan Sistem</h3>
        <p>Mempercepat penanganan serangan hama dengan pencatatan digital yang rapi dan terdokumentasi.</p>
    </article>
    <article class="card">
        <div class="icon">🧠</div>
        <h3>Computer Vision</h3>
        <p>Model EfficientNet-B0 memprediksi jenis hama dari foto daun beserta nilai confidence score.</p>
    </article>
    <article class="card">
        <div class="icon">📊</div>
        <h3>Status & Rekomendasi</h3>
        <p>Sistem otomatis menentukan status deteksi dan saran tindakan berdasarkan confidence score.</p>
    </article>
</section>
@endsection
