<?php

namespace App\Http\Controllers\nasabah;

use App\Http\Controllers\Controller;
use App\Models\NasabahSampah;
use App\Models\PesanNasabah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class RiwayatController extends Controller
{

    // public function riwayatNasabah($userId)
    // {
    //     $user = Auth::user();
    //     // Ambil transaksi nasabah berdasarkan user_id
    //     $Sampah = PesanNasabah::where('user_id', $userId)
    //         ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
    //         ->select('pesan_nasabah.*', 'lokasi_penjemputan.status')
    //         ->get();


    //     $cetakButton = new HtmlString('<a href="' . route('cetakRiwayatNasabah', ['userId' => $userId]) . '" class="btn btn-primary">Cetak PDF</a>');
    //     // Mengembalikan view dengan detail pesanan nasabah
    //     return view('nasabah.riwayatTransaksi', compact('user','Sampah', 'cetakButton'));
    // }
    public function riwayatNasabah(Request $request, $userId)
    {
        $user = Auth::user();

        // Ambil query builder untuk transaksi nasabah berdasarkan user_id
        $transaksis = PesanNasabah::where('user_id', $userId)
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->select('pesan_nasabah.*', 'lokasi_penjemputan.status');

        // Filter berdasarkan tanggal
        if ($request->has('date') && $request->date) {
            $transaksis->whereDay('pesan_nasabah.tanggal_pengumpulan', $request->date);
        }

        // Filter berdasarkan bulan
        if ($request->has('month') && $request->month) {
            $transaksis->whereMonth('pesan_nasabah.tanggal_pengumpulan', $request->month);
        }

        // Filter berdasarkan tahun
        if ($request->has('year') && $request->year) {
            $transaksis->whereYear('pesan_nasabah.tanggal_pengumpulan', $request->year);
        }

        // Eksekusi transaksis
        $Sampah = $transaksis->get();

        $notif = PesanNasabah::where('user_id', $userId)
        ->whereHas('lokasiPenjemputan', function ($query) {
            $query->where('status', 'disetujui');
        })
        ->get();
        // Buat tombol cetak PDF
        $cetakButton = new HtmlString('<a href="' . route('cetakRiwayatNasabah', ['userId' => $userId]) . '" class="btn btn-primary">Cetak PDF</a>');
        $transaksiss = PesanNasabah::where('user_id', $userId)->get();
        // Mengembalikan view dengan detail pesanan nasabah
        return view('nasabah.riwayatTransaksi', compact('notif','transaksis','transaksiss','userId', 'user', 'Sampah', 'cetakButton'));
    }


    public function cetakPDFDetailRiwayat(Request $request, $userId)
    {
        // Ambil query builder untuk transaksi nasabah berdasarkan user_id
        $transaksis = PesanNasabah::where('user_id', $userId)
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->select('pesan_nasabah.*', 'lokasi_penjemputan.status');

        // Filter berdasarkan tanggal
        if ($request->has('date') && $request->date) {
            $transaksis->whereDate('pesan_nasabah.tanggal_pengumpulan', $request->date);
        }

        // Filter berdasarkan bulan
        if ($request->has('month') && $request->month) {
            $transaksis->whereMonth('pesan_nasabah.tanggal_pengumpulan', $request->month);
        }

        // Filter berdasarkan tahun
        if ($request->has('year') && $request->year) {
            $transaksis->whereYear('pesan_nasabah.tanggal_pengumpulan', $request->year);
        }

        // Eksekusi transaksis
        $Sampah = $transaksis->get();

        // Load view untuk PDF
        $pdf = PDF::loadView('nasabah.cetakhistory', compact('transaksis','userId', 'Sampah'));

        // Return PDF
        return $pdf->download('detail_riwayat_transaksi_nasabah.pdf');
    }
    // public function cetakDetailRiwayat(Request $request, $userId)
    // {
    //     $transaksis = PesanNasabah::where('user_id', $userId)
    //         ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
    //         ->select('pesan_nasabah.*', 'lokasi_penjemputan.status');

    //     // Filter berdasarkan tanggal
    //     if ($request->has('date') && $request->date) {
    //         $query->whereDay('pesan_nasabah.tanggal_pengumpulan', $request->date);
    //     }

    //     // Filter berdasarkan bulan
    //     if ($request->has('month') && $request->month) {
    //         $query->whereMonth('pesan_nasabah.tanggal_pengumpulan', $request->month);
    //     }

    //     // Filter berdasarkan tahun
    //     if ($request->has('year') && $request->year) {
    //         $query->whereYear('pesan_nasabah.tanggal_pengumpulan', $request->year);
    //     }

    //     // Eksekusi query
    //     $Sampah = $query->get();

    //     // Render view ke dalam HTML
    //     $html = view('admin.cetakhistoryNasabah', compact('Sampah'))->render();

    //     // Konfigurasi PDF
    //     $pdf = Pdf::loadHTML($html);

    //     // Set nama file dengan tanggal
    //     $tanggal = now()->format('Y-m-d'); // Format tanggal
    //     $filename = 'detail_riwayat_transaksi_' . $tanggal . '.pdf';

    //     // Mengatur posisi kertas menjadi horizontal (landscape)
    //     $pdf->setPaper('landscape');

    //     // Render PDF dan kirim sebagai response
    //     return $pdf->download($filename);
    // }


}
