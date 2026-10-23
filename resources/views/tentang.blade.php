@extends('layouts.main')

@section('title', 'Tentang – AgriVision Garut')

@section('content')
<section class="page-title">
    <h1>Tentang AgriVision Garut</h1>
    <p>Informasi sistem, wilayah pantauan, dan model yang digunakan.</p>
</section>

<section class="grid grid-2 reveal">
    <article class="card">
        <h2>🎯 Tujuan Sistem</h2>
        <p>AgriVision Garut membantu Kelompok Tani Makmur mencatat hasil deteksi hama secara teratur, memantau riwayat serangan, dan menentukan tindak lanjut berdasarkan nilai confidence score.</p>
    </article>

    <article class="card">
        <h2>📍 Lokasi Deteksi</h2>
        <ul class="list">
            <li>Kecamatan Garut Kota</li>
            <li>Kecamatan Tarogong Kaler</li>
            <li>Kecamatan Samarang</li>
        </ul>
    </article>

    <article class="card">
        <h2>📝 Parameter yang Dicatat</h2>
        <ul class="list">
            <li>Jenis hama</li>
            <li>Confidence score</li>
            <li>Tingkat kerusakan daun</li>
        </ul>
    </article>

    <article class="card">
        <h2>🤖 Model Klasifikasi</h2>
        <p>Sistem menggunakan model <strong>EfficientNet-B0</strong>, yaitu model klasifikasi citra yang memprediksi jenis hama dari foto daun tanaman. Pada prototipe ini hasil prediksi diinput manual (simulasi).</p>
    </article>
</section>

<section class="card reveal">
    <h2>⚖️ Aturan Status Deteksi</h2>
    <div class="table-wrap">
        <table>
            <thead><tr><th>Confidence Score</th><th>Status</th><th>Rekomendasi</th></tr></thead>
            <tbody>
                <tr><td>&lt; 50%</td><td><span class="badge badge-gray">Tidak Pasti</span></td><td>Perlu verifikasi manual oleh petugas</td></tr>
                <tr><td>50 – 80%</td><td><span class="badge badge-yellow">Indikasi Hama</span></td><td>Lakukan pemantauan intensif</td></tr>
                <tr><td>&gt; 80%</td><td><span class="badge badge-red">Hama Terkonfirmasi</span></td><td>Segera lakukan pengendalian hama</td></tr>
            </tbody>
        </table>
    </div>
</section>
@endsection
