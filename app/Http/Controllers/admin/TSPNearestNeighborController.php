<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\hargaSampah;
use App\Models\PesanNasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\LokasiPenjemputan;
use App\Models\Catatan;
use App\Models\User;

class TSPNearestNeighborController extends Controller
{
    public function nearestNeighbor()
    {
        $user = Auth::user();
        $Sampah = DB::table('pesan_nasabah')
            ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->select('pesan_nasabah.*', 'users.name as name', 'lokasi_penjemputan.koordinat', 'lokasi_penjemputan.lokasi', 'lokasi_penjemputan.status' , 'lokasi_penjemputan.jarak')
            ->where('lokasi_penjemputan.status', 'disetujui')
            ->orderBy('lokasi_penjemputan.jarak', 'asc')
            ->get();

        // $Sampah = DB::table('pesan_nasabah')
        //     ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
        //     ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
        //     ->select('pesan_nasabah.*', 'users.name as name', 'lokasi_penjemputan.koordinat', 'lokasi_penjemputan.lokasi', 'lokasi_penjemputan.status', 'lokasi_penjemputan.jarak')
        //     ->where('lokasi_penjemputan.status', 'disetujui')
        //     ->orderBy('lokasi_penjemputan.jarak', 'asc')
        //     ->get();


        // Memulai dari koordinat awal
        $start_latitude = -7.322191655237305;
        $start_longitude = 112.73470170620698;

        // Konversi data ke array untuk memudahkan manipulasi
        $locations = $Sampah->map(function ($item) {
            $coords = explode(',', $item->koordinat);
            return [
                'sampah' => $item,
                'latitude' => $coords[0],
                'longitude' => $coords[1]
            ];
        })->toArray();

        $route = [];
        $current_location = ['latitude' => $start_latitude, 'longitude' => $start_longitude];

        while (!empty($locations)) {
            $nearest = null;
            $nearest_distance = PHP_INT_MAX;
            $nearest_key = null;

            foreach ($locations as $key => $location) {
                $distance = $this->calculateDistance($current_location['latitude'], $current_location['longitude'], $location['latitude'], $location['longitude']);
                if ($distance < $nearest_distance) {
                    $nearest_distance = $distance;
                    $nearest = $location;
                    $nearest_key = $key;
                }
            }

            $route[] = $nearest['sampah'];
            $current_location = ['latitude' => $nearest['latitude'], 'longitude' => $nearest['longitude']];
            unset($locations[$nearest_key]);
        }

        return view('admin.ruteNasabah', compact('Sampah','user', 'route'));
    }

    private function calculateDistance($latitude1, $longitude1, $latitude2, $longitude2)
    {
        $earth_radius = 6371; // Radius bumi dalam kiloeter

        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) *
             sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earth_radius * $c;

        return $distance;;
    }

    
    public function detailtransaksiMasukNasabah($no_reff)
    {
        // Temukan data nasabah berdasarkan nomor referensi
        $sampah = DB::table('pesan_nasabah')
            ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.user_id', '=', 'lokasi_penjemputan.user_id') // Menggunakan LEFT JOIN agar data tetap tampil jika tidak ada lokasi_penjemputan
            ->select('pesan_nasabah.*', 'users.name as name', 'lokasi_penjemputan.lokasi', 'lokasi_penjemputan.jarak')
            ->where('pesan_nasabah.no_reff', $no_reff) // Filter berdasarkan nomor referensi
            ->first(); // Ambil data pertama

        if (!$sampah) {
            // Handle jika data tidak ditemukan
            return abort(404);
        }

        // Kirim data ke view untuk ditampilkan
        return view('nasabah.detail', compact('sampah'));
    }

    public function updateSelesai(Request $request)
    {
        // Temukan data nasabah berdasarkan nomor referensi

        $sampah = LokasiPenjemputan::where('no_reff', request()->no_reff)->first();
        if (!$sampah) {
            // Handle jika data tidak ditemukan
            return abort(404);
        }
        $catatan = new Catatan();
        $catatan->no_reff = $sampah->no_reff; // ID lokasi penjemputan
        $catatan->catatan = $request->catatan; // Catatan dari formulir
        $catatan->save();
        // Update status menjadi "disetujui"

        $sampah->update([
            'status' => 'selesai',
            // Simpan catatan yang dikirimkan dari formulir
        ]);

        $pesanNasabah = PesanNasabah::where('no_reff', $request->no_reff)->first();
        if ($pesanNasabah) {
            // Update berat sampah pada tabel pesan_nasabah
            $pesanNasabah->update([
                'berat_sampah' => $request->berat_sampah,
            ]);
    
            
            // Temukan harga sampah berdasarkan jenis sampah
            $hargaSampah = hargaSampah::where('jenis_sampah', $pesanNasabah->jenis_sampah)->first();
    
            if ($hargaSampah) {
                // Hitung total harga transaksi
                $totalHargaTransaksi = $request->berat_sampah * $hargaSampah->harga;
    
                // Temukan pengguna berdasarkan user_id dari pesan nasabah
                $user = User::find($pesanNasabah->user_id);
    
                if ($user) {
                    // Update saldo pengguna
                    $user->saldo += $totalHargaTransaksi;
                    $user->save();
                }
            }}
        // $pesanNasabah = PesanNasabah::where('no_reff', $request->no_reff)->first();
        // if ($pesanNasabah) {
        //     // Update berat sampah pada tabel pesan_nasabah
        //     $pesanNasabah->update([
        //         'berat_sampah' => $request->berat_sampah,
        //     ]);
        // }

        // Redirect atau kirim respons JSON sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}