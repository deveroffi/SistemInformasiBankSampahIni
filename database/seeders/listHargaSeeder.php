<?php

namespace Database\Seeders;

use App\Models\hargaSampah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class listHargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        {
            $data = [
                ['kode' => 'A1', 'jenis_sampah' => 'Kardus Bagus', 'harga' => 1000],
                ['kode' => 'A2', 'jenis_sampah' => 'Kardus Jelek', 'harga' => 900],
                ['kode' => 'A3', 'jenis_sampah' => 'Koran', 'harga' => 2800],
                ['kode' => 'A4', 'jenis_sampah' => 'HVS', 'harga' => 1600],
                ['kode' => 'A5', 'jenis_sampah' => 'Buram', 'harga' => 800],
                ['kode' => 'A6', 'jenis_sampah' => 'Majalah', 'harga' => 600],
                ['kode' => 'A7', 'jenis_sampah' => 'Sak Semen', 'harga' => 800],
                ['kode' => 'A8', 'jenis_sampah' => 'Duplek', 'harga' => 200],
                ['kode' => 'B1', 'jenis_sampah' => 'Botol PET Bening Bersih', 'harga' => 2500],
                ['kode' => 'B2', 'jenis_sampah' => 'Botol PET Biru Muda Bersih', 'harga' => 2000],
                ['kode' => 'B3', 'jenis_sampah' => 'Botol PET Warna Bersih', 'harga' => 1100],
                ['kode' => 'B4', 'jenis_sampah' => 'Botol PET Kotor', 'harga' => 800],
                ['kode' => 'B6', 'jenis_sampah' => 'Botol PET Jelek/Minyak', 'harga' => 50],
                ['kode' => 'C1', 'jenis_sampah' => 'Tutup Botol Minuman', 'harga' => 1200],
                ['kode' => 'C2', 'jenis_sampah' => 'Tutup Galon', 'harga' => 1900],
                ['kode' => 'C3', 'jenis_sampah' => 'Tutup Campur', 'harga' => 300],
                ['kode' => 'E1', 'jenis_sampah' => 'Gelas PI Bening Bersih', 'harga' => 3000],
                ['kode' => 'E2', 'jenis_sampah' => 'Gelas PI Bening Kotor', 'harga' => 1200],
                ['kode' => 'E3', 'jenis_sampah' => 'Gelas PI Sablon & Sedotan', 'harga' => 1300],
                ['kode' => 'G1', 'jenis_sampah' => 'Galon Utuh (Aqua /Club /Bahan Sejenis)', 'harga' => 3100],
                ['kode' => 'G2', 'jenis_sampah' => 'CD', 'harga' => 3100],
                ['kode' => 'H1', 'jenis_sampah' => 'Bak/Emberan Fix', 'harga' => 1400],
                ['kode' => 'H2', 'jenis_sampah' => 'Bak Hitam', 'harga' => 400],
                ['kode' => 'H3', 'jenis_sampah' => 'Kertas', 'harga' => 50],
                ['kode' => 'H4', 'jenis_sampah' => 'Bak Campur (Bak Keras)', 'harga' => 300],
                ['kode' => 'I1', 'jenis_sampah' => 'Plastik Bening', 'harga' => 500],
                ['kode' => 'I2', 'jenis_sampah' => 'Kresek', 'harga' => 100],
                ['kode' => 'I3', 'jenis_sampah' => 'Sablon Tipis', 'harga' => 100],
                ['kode' => 'I4', 'jenis_sampah' => 'Sachet/Kemasan Metalis', 'harga' => 50],
                ['kode' => 'I5', 'jenis_sampah' => 'Karung Kecil/Rusak', 'harga' => 200],
                ['kode' => 'I6', 'jenis_sampah' => 'Sablon Tebal', 'harga' => 250],
                ['kode' => 'I7', 'jenis_sampah' => 'Lembaran Campur', 'harga' => 50],
                ['kode' => 'J1', 'jenis_sampah' => 'Botol Sirup Bagus', 'harga' => 80],
                ['kode' => 'J2', 'jenis_sampah' => 'Botol Kecap/Saos Besar', 'harga' => 200],
                ['kode' => 'J3', 'jenis_sampah' => 'Botol Bensin Besar', 'harga' => 700],
                ['kode' => 'J4', 'jenis_sampah' => 'Botol Bir Bintang Besar', 'harga' => 400],
                ['kode' => 'J5', 'jenis_sampah' => 'Botol/Beling Warna', 'harga' => 50],
                ['kode' => 'J6', 'jenis_sampah' => 'Botol/Beling Putih', 'harga' => 80],
            ];
    
            foreach ($data as $item) {
                hargaSampah::create($item);
            }
        }
    }
}
