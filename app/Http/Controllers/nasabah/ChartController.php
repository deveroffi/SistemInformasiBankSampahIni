<?php

namespace App\Http\Controllers\nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LokasiPenjemputan;
use App\Models\PesanNasabah;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChartController extends Controller
{
    public function tampilchart()
    {
        $user = Auth::user();
        $userId = Auth::id();

        // Ambil semua transaksi nasabah berdasarkan id pengguna
        $transaksis = PesanNasabah::where('user_id', $userId)->get();

        // Ambil jumlah sampah berdasarkan jenis untuk pengguna yang sedang login
        $totalSampahPlastik = PesanNasabah::where('user_id', $userId)->where('jenis_sampah', 'plastik')->count();
        $totalSampahKertas = PesanNasabah::where('user_id', $userId)->where('jenis_sampah', 'kertas')->count();
        $totalSampahLainnya = PesanNasabah::where('user_id', $userId)
            ->whereNotIn('jenis_sampah', ['kertas', 'plastik'])
            ->count();

        $belumDisetujui = PesanNasabah::join('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->where('lokasi_penjemputan.status', 'belum disetujui')
            ->where('pesan_nasabah.user_id', $userId)
            ->count();

        $disetujui = PesanNasabah::join('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->where('lokasi_penjemputan.status', 'disetujui')
            ->where('pesan_nasabah.user_id', $userId)
            ->count();

        $selesai = PesanNasabah::join('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->where('lokasi_penjemputan.status', 'selesai')
            ->where('pesan_nasabah.user_id', $userId)
            ->count();

        $totalTransaksi = DB::table('pesan_nasabah')
            ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('COUNT(pesan_nasabah.user_id) as total_transaksi'))
            ->groupBy('users.name')
            ->orderByDesc('total_transaksi')
            ->get();

        $totalTransaksiPerTanggal = DB::table('pesan_nasabah')
            ->select(DB::raw('DATE(tanggal_pengumpulan) as tanggal'), DB::raw('COUNT(user_id) as total_transaksi'))
            ->where('user_id', $userId)
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();


        return view('nasabah.chart', compact('user','totalTransaksiPerTanggal', 'totalTransaksi', 'belumDisetujui', 'disetujui', 'selesai', 'transaksis', 'totalSampahPlastik', 'totalSampahKertas', 'totalSampahLainnya'));




    }
}
