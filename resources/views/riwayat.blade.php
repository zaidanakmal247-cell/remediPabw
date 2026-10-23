@extends('layouts.main')

@section('title', 'Riwayat Deteksi – AgriVision Garut')

@section('content')
<section class="page-title">
    <h1>Riwayat Deteksi Hama</h1>
    <p>Seluruh data deteksi yang tersimpan di database.</p>
</section>

<section class="grid grid-4 reveal">
    <div class="stat"><strong>{{ $ringkasan['total'] }}</strong><span>Total Deteksi</span></div>
    <div class="stat stat-gray"><strong>{{ $ringkasan['tidak'] }}</strong><span>Tidak Pasti</span></div>
    <div class="stat stat-yellow"><strong>{{ $ringkasan['indikasi'] }}</strong><span>Indikasi Hama</span></div>
    <div class="stat stat-red"><strong>{{ $ringkasan['terkonfirmasi'] }}</strong><span>Hama Terkonfirmasi</span></div>
</section>

<section class="card reveal">
    <div class="toolbar">
        <input type="search" id="cari" placeholder="🔎 Cari lokasi, tanaman, atau hama...">
        <select id="filterStatus">
            <option value="">Semua Status</option>
            <option>Tidak Pasti</option>
            <option>Indikasi Hama</option>
            <option>Hama Terkonfirmasi</option>
        </select>
        <a href="{{ route('deteksi') }}" class="btn btn-primary">➕ Tambah</a>
    </div>

    <div class="table-wrap">
        <table id="tabelRiwayat">
            <thead>
                <tr>
                    <th>No</th><th>Waktu</th><th>Lokasi</th><th>Tanaman</th><th>Jenis Hama</th>
                    <th>Confidence</th><th>Kerusakan</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayat as $i => $item)
                    <tr data-status="{{ $item->status_deteksi }}">
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->nama_tanaman }}</td>
                        <td>{{ $item->jenis_hama }}</td>
                        <td>{{ $item->confidence_score }}%</td>
                        <td>{{ $item->tingkat_kerusakan }}%</td>
                        <td>
                            @if ($item->status_deteksi === 'Hama Terkonfirmasi')
                                <span class="badge badge-red">{{ $item->status_deteksi }}</span>
                            @elseif ($item->status_deteksi === 'Indikasi Hama')
                                <span class="badge badge-yellow">{{ $item->status_deteksi }}</span>
                            @else
                                <span class="badge badge-gray">{{ $item->status_deteksi }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="empty">Belum ada data deteksi. Silakan input terlebih dahulu.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <p class="muted" id="infoJumlah"></p>
</section>
@endsection
