@extends('layouts.main')

@section('title', 'Input Deteksi – AgriVision Garut')

@section('content')
<section class="page-title">
    <h1>Input Hasil Deteksi Hama</h1>
    <p>Masukkan hasil prediksi model EfficientNet-B0 secara manual.</p>
</section>

<div class="grid grid-form">
    <form action="{{ route('deteksi.proses') }}" method="POST" class="card form" id="formDeteksi" novalidate>
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali isian Anda:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="field">
            <label for="lokasi">📍 Lokasi Lahan</label>
            <select name="lokasi" id="lokasi" required>
                <option value="" disabled {{ old('lokasi') ? '' : 'selected' }}>-- Pilih kecamatan --</option>
                @foreach (['Garut Kota', 'Tarogong Kaler', 'Samarang'] as $lok)
                    <option value="{{ $lok }}" {{ old('lokasi') === $lok ? 'selected' : '' }}>{{ $lok }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="field">
                <label for="nama_tanaman">🌱 Nama Tanaman</label>
                <input type="text" name="nama_tanaman" id="nama_tanaman" list="listTanaman"
                       placeholder="Contoh: Padi" value="{{ old('nama_tanaman') }}" required>
                <datalist id="listTanaman">
                    <option value="Padi"><option value="Jagung"><option value="Cabai">
                </datalist>
            </div>

            <div class="field">
                <label for="jenis_hama">🐛 Jenis Hama Hasil Prediksi</label>
                <input type="text" name="jenis_hama" id="jenis_hama" list="listHama"
                       placeholder="Contoh: Wereng Cokelat" value="{{ old('jenis_hama') }}" required>
                <datalist id="listHama">
                    <option value="Wereng Cokelat"><option value="Ulat Grayak"><option value="Kutu Daun">
                </datalist>
            </div>
        </div>

        <div class="field">
            <label for="confidence_score">🎯 Confidence Score (%)</label>
            <div class="slider-row">
                <input type="range" id="confidenceRange" min="0" max="100" value="{{ old('confidence_score', 50) }}">
                <input type="number" name="confidence_score" id="confidence_score" min="0" max="100" step="1"
                       value="{{ old('confidence_score', 50) }}" required>
            </div>
            <div class="live-status" id="liveStatus">Status: –</div>
        </div>

        <div class="field">
            <label for="tingkat_kerusakan">🍃 Tingkat Kerusakan Daun (%)</label>
            <div class="slider-row">
                <input type="range" id="kerusakanRange" min="0" max="100" step="0.1" value="{{ old('tingkat_kerusakan', 0) }}">
                <input type="number" name="tingkat_kerusakan" id="tingkat_kerusakan" min="0" max="100" step="0.1"
                       value="{{ old('tingkat_kerusakan', 0) }}" required>
            </div>
            <div class="bar"><div class="bar-fill" id="kerusakanBar"></div></div>
        </div>

        <button type="submit" class="btn btn-primary btn-block" id="btnSubmit">🔍 Proses & Simpan Deteksi</button>
    </form>

    <aside class="card tips">
        <h3>💡 Panduan Cepat</h3>
        <ul class="list">
            <li><span class="badge badge-gray">&lt; 50%</span> Tidak Pasti</li>
            <li><span class="badge badge-yellow">50–80%</span> Indikasi Hama</li>
            <li><span class="badge badge-red">&gt; 80%</span> Hama Terkonfirmasi</li>
        </ul>
        <p class="muted">Pratinjau status akan muncul otomatis saat Anda menggeser confidence score.</p>
    </aside>
</div>
@endsection
