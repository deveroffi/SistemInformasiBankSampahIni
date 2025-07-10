<?php

namespace App\Http\Controllers\nasabah;

use App\Http\Controllers\Controller;
use App\Models\Catatan;
use App\Models\hargaSampah;
use Illuminate\Http\Request;
use App\Models\LokasiPenjemputan;
use App\Models\PesanNasabah;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeNasabahController extends Controller
{
    public function tampilhome()
    {
        $user = Auth::user();
        // Dapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil semua transaksi nasabah berdasarkan id pengguna
        $transaksis = PesanNasabah::where('user_id', $userId)->get();


        // Ambil jumlah sampah berdasarkan jenis untuk pengguna yang sedang login
        $totalSampahPlastik = PesanNasabah::where('user_id', $userId)->where('jenis_sampah', 'plastik')->count();
        $totalSampahKertas = PesanNasabah::where('user_id', $userId)->where('jenis_sampah', 'kertas')->count();
        $totalSampahLainnya = PesanNasabah::where('user_id', $userId)
            ->whereNotIn('jenis_sampah', ['kertas', 'plastik'])
            ->count();


        $totalTransaksiPerTanggal = DB::table('pesan_nasabah')
            ->select(DB::raw('DATE(tanggal_pengumpulan) as tanggal'), DB::raw('COUNT(*) as total_transaksi'))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $transaksis = PesanNasabah::where('user_id', $userId)
            ->whereHas('lokasiPenjemputan', function ($query) {
                $query->where('status', 'disetujui');
            })
            ->with('catatan') // Memuat relasi catatan
            ->get();





        // Tambahkan catatan ke dalam array semua catatan

        $userId = Auth::id();

        // Dapatkan saldo pengguna berdasarkan ID pengguna
        $totalReward = User::where('id', $userId)->value('saldo');
        // $totalReward = User::where('user_id', $userId)->get(['saldo']);
        // Iterasi setiap transaksi


        return view('myhome', compact('user', 'totalReward', 'totalTransaksiPerTanggal', 'transaksis', 'totalSampahPlastik', 'totalSampahKertas', 'totalSampahLainnya'));
    }
}
