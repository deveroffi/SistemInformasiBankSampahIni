<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\hargaSampah;
use Illuminate\Support\HtmlString;
use App\Models\homeAdmin;
use App\Models\LokasiPenjemputan;
use App\Models\NasabahSampah;
use App\Models\PesanNasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class RewardNasabahController extends Controller
{
    public function tampilrewardNasabah()
    {


        $transaksiNasabah = PesanNasabah::all();
        $user = Auth::user();
        $userId = Auth::id();

        // $transaksis = PesanNasabah::where('user_id', $userId)
        //     ->whereHas('lokasiPenjemputan', function ($query) {
        //         $query->where('status', 'selesai');
        //     })
        //     ->get();

        // $transaksis = DB::table('pesan_nasabah')
        //     ->join('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
        //     ->select('pesan_nasabah.user_id', DB::raw('COUNT(*) as total_transaksi'))
        //     ->where('lokasi_penjemputan.status', 'selesai')
        //     ->groupBy('pesan_nasabah.user_id')
        //     ->orderByDesc('total_transaksi')
        //     ->get();





        // $totalReward = 0;
        // //$totalTransaksi = $transaksis->count();

        // // Iterasi setiap transaksi
        // foreach ($transaksis as $transaksi) {
        //     // Ambil jenis sampah dari transaksi
        //     $jenisSampah = $transaksi->jenis_sampah;

        //     // Cari harga sampah berdasarkan jenis sampah
        //     $hargaSampah = hargaSampah::where('jenis_sampah', $jenisSampah)->first();

        //     // Jika harga sampah ditemukan
        //     if ($hargaSampah) {
        //         // Hitung total harga transaksi
        //         $totalHargaTransaksi = $hargaSampah->harga ;

        //         // Tambahkan ke total reward

        //     }

        //     $totalReward += $totalHargaTransaksi;
        // }

        $nasabah = DB::table('pesan_nasabah')
            ->join('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->select('pesan_nasabah.user_id', DB::raw('COUNT(*) as total_transaksi'), 'users.saldo')
            ->where('lokasi_penjemputan.status', 'selesai')
            ->groupBy('pesan_nasabah.user_id', 'users.saldo')
            ->orderByDesc('users.saldo') // Urutkan berdasarkan saldo terbesar
            ->get();

            




        $cetakButton = new HtmlString('<a href="' . route('cetakRewardNasabah') . '" class="btn btn-primary">Cetak PDF</a>');
        // Kembalikan data ke tampilan
        return view('admin.rewardNasabah', compact('user','nasabah', 'cetakButton'));

        //return view('admin.rewardNasabah', compact('Nasabah', 'totalSampah', 'totalTransaksi'));
    }

    public function cetakRewardNasabah()
    {
        $transaksiNasabah = PesanNasabah::all();

        $userId = Auth::id();

        // $transaksis = PesanNasabah::where('user_id', $userId)
        //     ->whereHas('lokasiPenjemputan', function ($query) {
        //         $query->where('status', 'selesai');
        //     })
        //     ->get();

        // $transaksis = DB::table('pesan_nasabah')
        //     ->join('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
        //     ->select('pesan_nasabah.user_id', DB::raw('COUNT(*) as total_transaksi'))
        //     ->where('lokasi_penjemputan.status', 'selesai')
        //     ->groupBy('pesan_nasabah.user_id')
        //     ->orderByDesc('total_transaksi')
        //     ->get();

        $nasabah = DB::table('pesan_nasabah')
            ->join('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->leftJoin('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->select(
                'pesan_nasabah.user_id',
                DB::raw('COUNT(*) as total_transaksi'),
                'users.saldo' // Ambil kolom saldo dari tabel users
            )
            ->where('lokasi_penjemputan.status', 'selesai')
            ->groupBy('pesan_nasabah.user_id', 'users.saldo') // Tambahkan kolom saldo ke dalam GROUP BY
            ->orderByDesc('saldo')
            ->get();
        // Render view ke dalam HTML
        $html = view('admin.cetakRewardNasabah', compact('nasabah', ))->render();

        // Konfigurasi PDF
        $pdf = PDF::loadHTML($html);

        // Set nama file dengan tanggal
        $tanggal = Carbon::now()->format('Y-m-d'); // Format tanggal
        $filename = 'reward_nasabah_' . $tanggal . '.pdf';

        // Render PDF dan kirim sebagai response
        return $pdf->download($filename);
    }
}
