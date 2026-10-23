<?php

namespace App\Http\Controllers;

use App\Models\DeteksiHama;
use Illuminate\Http\Request;

class DeteksiController extends Controller
{
    /** Menampilkan form input hasil deteksi */
    public function form()
    {
        return view('deteksi');
    }

    /** Menerima, mengolah, dan menyimpan data hasil deteksi */
    public function prosesData(Request $request)
    {
        $data = $request->validate([
            'lokasi'            => 'required|in:Garut Kota,Tarogong Kaler,Samarang',
            'nama_tanaman'      => 'required|string|max:100',
            'jenis_hama'        => 'required|string|max:100',
            'confidence_score'  => 'required|integer|between:0,100',
            'tingkat_kerusakan' => 'required|numeric|between:0,100',
        ], [
            'required' => ':attribute wajib diisi.',
            'between'  => ':attribute harus berada di antara :min dan :max.',
            'integer'  => ':attribute harus berupa bilangan bulat.',
            'numeric'  => ':attribute harus berupa angka.',
            'in'       => ':attribute tidak valid.',
        ], [
            'lokasi'            => 'Lokasi lahan',
            'nama_tanaman'      => 'Nama tanaman',
            'jenis_hama'        => 'Jenis hama',
            'confidence_score'  => 'Confidence score',
            'tingkat_kerusakan' => 'Tingkat kerusakan daun',
        ]);

        // Pengolahan status deteksi berdasarkan confidence score
        $hasil = $this->tentukanStatus((int) $data['confidence_score']);

        $data['status_deteksi'] = $hasil['status'];

        // Simpan menggunakan Eloquent ORM
        $deteksi = DeteksiHama::create($data);

        return view('hasil', [
            'deteksi'     => $deteksi,
            'rekomendasi' => $hasil['rekomendasi'],
        ]);
    }

    /** Menampilkan seluruh riwayat deteksi */
    public function riwayat()
    {
        $riwayat = DeteksiHama::latest()->get();

        $ringkasan = [
            'total'      => $riwayat->count(),
            'tidak'      => $riwayat->where('status_deteksi', 'Tidak Pasti')->count(),
            'indikasi'   => $riwayat->where('status_deteksi', 'Indikasi Hama')->count(),
            'terkonfirmasi' => $riwayat->where('status_deteksi', 'Hama Terkonfirmasi')->count(),
        ];

        return view('riwayat', compact('riwayat', 'ringkasan'));
    }

    /** Aturan: <50 Tidak Pasti | 50-80 Indikasi Hama | >80 Hama Terkonfirmasi */
    private function tentukanStatus(int $confidence): array
    {
        if ($confidence < 50) {
            return ['status' => 'Tidak Pasti', 'rekomendasi' => 'Perlu verifikasi manual oleh petugas'];
        } elseif ($confidence <= 80) {
            return ['status' => 'Indikasi Hama', 'rekomendasi' => 'Lakukan pemantauan intensif'];
        }

        return ['status' => 'Hama Terkonfirmasi', 'rekomendasi' => 'Segera lakukan pengendalian hama'];
    }
}