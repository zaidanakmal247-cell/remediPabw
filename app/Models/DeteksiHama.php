<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeteksiHama extends Model
{
    protected $table = 'deteksi_hama';

    protected $fillable = [
        'lokasi',
        'nama_tanaman',
        'jenis_hama',
        'confidence_score',
        'tingkat_kerusakan',
        'status_deteksi',
    ];
}
