<?php

namespace Database\Seeders;

use App\Models\DeteksiHama;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DeteksiHamaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $lokasi  = ['Garut Kota', 'Tarogong Kaler', 'Samarang'];
        $tanaman = ['Padi', 'Jagung', 'Cabai'];
        $hama    = ['Wereng Cokelat', 'Ulat Grayak', 'Kutu Daun'];

        for ($i = 0; $i < 20; $i++) {
            $confidence = $faker->numberBetween(30, 99);

            if ($confidence < 50) {
                $status = 'Tidak Pasti';
            } elseif ($confidence <= 80) {
                $status = 'Indikasi Hama';
            } else {
                $status = 'Hama Terkonfirmasi';
            }

            $waktu = $faker->dateTimeBetween('-30 days', 'now');

            DeteksiHama::create([
                'lokasi'            => $faker->randomElement($lokasi),
                'nama_tanaman'      => $faker->randomElement($tanaman),
                'jenis_hama'        => $faker->randomElement($hama),
                'confidence_score'  => $confidence,
                'tingkat_kerusakan' => $faker->randomFloat(1, 0, 80),
                'status_deteksi'    => $status,
                'created_at'        => $waktu,
                'updated_at'        => $waktu,
            ]);
        }
    }
}
