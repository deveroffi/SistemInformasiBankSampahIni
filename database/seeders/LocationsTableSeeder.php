<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $locations = [
            ['lokasi_maps' => 'Jl. Adityawarman', 'latitude' => -7.292237, 'longitude' => 112.716952],
            ['lokasi_maps' => 'Jl. Ahmad Yani', 'latitude' => -7.320500, 'longitude' => 112.729178],
            ['lokasi_maps' => 'Jl. Basuki Rahmat', 'latitude' => -7.263178, 'longitude' => 112.737113],
            ['lokasi_maps' => 'Jl. Dharmahusada', 'latitude' => -7.274376, 'longitude' => 112.759438],
            ['lokasi_maps' => 'Jl. Dharmawangsa', 'latitude' => -7.278971, 'longitude' => 112.757502],
            ['lokasi_maps' => 'Jl. Diponegoro', 'latitude' => -7.279124, 'longitude' => 112.727144],
            ['lokasi_maps' => 'Jl. Dukuh Kupang', 'latitude' => -7.277063, 'longitude' => 112.705939],
            ['lokasi_maps' => 'Jl. Embong Malang', 'latitude' => -7.259908, 'longitude' => 112.737881],
            ['lokasi_maps' => 'Jl. Genteng Kali', 'latitude' => -7.259290, 'longitude' => 112.740508],
            ['lokasi_maps' => 'Jl. Gubeng', 'latitude' => -7.267177, 'longitude' => 112.757200],
            ['lokasi_maps' => 'Jl. Jemursari', 'latitude' => -7.317693, 'longitude' => 112.742499],
            ['lokasi_maps' => 'Jl. Kapasan', 'latitude' => -7.245548, 'longitude' => 112.748581],
            ['lokasi_maps' => 'Jl. Kalibokor', 'latitude' => -7.287989, 'longitude' => 112.743106],
            ['lokasi_maps' => 'Jl. Kedungdoro', 'latitude' => -7.263256, 'longitude' => 112.735051],
            ['lokasi_maps' => 'Jl. Kembang Jepun', 'latitude' => -7.236713, 'longitude' => 112.736187],
            ['lokasi_maps' => 'Jl. Kenjeran', 'latitude' => -7.245609, 'longitude' => 112.760078],
            ['lokasi_maps' => 'Jl. Kertajaya', 'latitude' => -7.281622, 'longitude' => 112.762144],
            ['lokasi_maps' => 'Jl. Kranggan', 'latitude' => -7.247331, 'longitude' => 112.735074],
            ['lokasi_maps' => 'Jl. Kusuma Bangsa', 'latitude' => -7.247745, 'longitude' => 112.742021],
            ['lokasi_maps' => 'Jl. Manyar Kertoarjo', 'latitude' => -7.280627, 'longitude' => 112.768383],
            ['lokasi_maps' => 'Jl. Margorejo', 'latitude' => -7.319703, 'longitude' => 112.746737],
            ['lokasi_maps' => 'Jl. Mayjen Sungkono', 'latitude' => -7.294812, 'longitude' => 112.713548],
            ['lokasi_maps' => 'Jl. Ngagel', 'latitude' => -7.291261, 'longitude' => 112.748116],
            ['lokasi_maps' => 'Jl. Ngagel Jaya', 'latitude' => -7.290384, 'longitude' => 112.750792],
            ['lokasi_maps' => 'Jl. Nginden', 'latitude' => -7.295692, 'longitude' => 112.761249],
            ['lokasi_maps' => 'Jl. Nginden Semolo', 'latitude' => -7.295692, 'longitude' => 112.761249], 
            ['lokasi_maps' => 'Jl. Pacar Keling', 'latitude' => -7.264755, 'longitude' => 112.758933],
            ['lokasi_maps' => 'Jl. Pandegiling', 'latitude' => -7.265494, 'longitude' => 112.737249],
            ['lokasi_maps' => 'Jl. Panglima Sudirman', 'latitude' => -7.268723, 'longitude' => 112.748049],
            ['lokasi_maps' => 'Jl. Pasar Kembang', 'latitude' => -7.265193, 'longitude' => 112.735517],
            ['lokasi_maps' => 'Jl. Prof. Dr. Moestopo', 'latitude' => -7.292245, 'longitude' => 112.758201],
            ['lokasi_maps' => 'Jl. Pucang Anom', 'latitude' => -7.284048, 'longitude' => 112.760593],
            ['lokasi_maps' => 'Jl. Rajawali', 'latitude' => -7.234289, 'longitude' => 112.730523],
            ['lokasi_maps' => 'Jl. Sulawesi', 'latitude' => -7.238843, 'longitude' => 112.729400],
            ['lokasi_maps' => 'Jl. Tegalsari', 'latitude' => -7.268182, 'longitude' => 112.735998],
            ['lokasi_maps' => 'Jl. Tunjungan', 'latitude' => -7.257848, 'longitude' => 112.736074],
            ['lokasi_maps' => 'Jl. Urip Sumoharjo', 'latitude' => -7.256060, 'longitude' => 112.744274],
            ['lokasi_maps' => 'Jl. Walikota Mustajab', 'latitude' => -7.262801, 'longitude' => 112.745074],
            ['lokasi_maps' => 'Jl. Wonokromo', 'latitude' => -7.318431, 'longitude' => 112.736178],
        ];
        

        DB::table('locations')->insert($locations);
    }

}
