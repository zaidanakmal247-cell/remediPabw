@extends('layouts.main')

@section('title', 'Hasil Deteksi – AgriVision Garut')

@section('content')
<section class="page-title">
    <h1>Hasil Deteksi Hama</h1>
    <p>Data berhasil disimpan ke database.</p>
</section>

@if ($deteksi->status_deteksi === 'Hama Terkonfirmasi')
    <div class="result result-red reveal">
        <div class="result-icon">🚨</div>
        <div>
            <h2>Hama Terkonfirmasi</h2>
            <p>{{ $rekomendasi }}</p>
        </div>
    </div>
@elseif ($deteksi->status_deteksi === 'Indikasi Hama')
    <div class="result result-yellow reveal">
        <div class="result-icon">⚠️</div>
        <div>
            <h2>Indikasi Hama</h2>
            <p>{{ $rekomendasi }}</p>
        </div>
    </div>
@else
    <div class="result result-gray reveal">
        <div class="result-icon">❓</div>
        <div>
            <h2>Tidak Pasti</h2>
            <p>{{ $rekomendasi }}</p>
        </div>
    </div>
@endif

<section class="card reveal">
    <div class="table-wrap">
        <table class="table-detail">
            <tbody>
                <tr><th>Lokasi Lahan</th><td>{{ $deteksi->lokasi }}</td></tr>
                <tr><th>Nama Tanaman</th><td>{{ $deteksi->nama_tanaman }}</td></tr>
                <tr><th>Jenis Hama</th><td>{{ $deteksi->jenis_hama }}</td></tr>
                <tr><th>Confidence Score</th><td>{{ $deteksi->confidence_score }}%</td></tr>
                <tr><th>Tingkat Kerusakan Daun</th><td>{{ $deteksi->tingkat_kerusakan }}%</td></tr>
                <tr>
                    <th>Status Deteksi</th>
                    <td>
                        @if ($deteksi->status_deteksi === 'Hama Terkonfirmasi')
                            <span class="badge badge-red">{{ $deteksi->status_deteksi }}</span>
                        @elseif ($deteksi->status_deteksi === 'Indikasi Hama')
                            <span class="badge badge-yellow">{{ $deteksi->status_deteksi }}</span>
                        @else
                            <span class="badge badge-gray">{{ $deteksi->status_deteksi }}</span>
                        @endif
                    </td>
                </tr>
                <tr><th>Rekomendasi Penanganan</th><td>{{ $rekomendasi }}</td></tr>
            </tbody>
        </table>
    </div>

    <div class="hero-actions left">
        <a href="{{ route('deteksi') }}" class="btn btn-primary">➕ Input Lagi</a>
        <a href="{{ route('riwayat') }}" class="btn btn-outline">📋 Lihat Riwayat</a>
    </div>
</section>
@endsection
