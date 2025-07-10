<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NasabahSampah;
use App\Models\PesanNasabah;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class RiwayatNasabahController extends Controller
{
    public function tampilRiwayatNasabah()
    {
        $user = Auth::user();
        $role = 'user';
        $Nasabah = NasabahSampah::getDataByRole($role)
            ->sortBy('name');

        return view('admin.riwayatTransaksiNasabah', compact('user','Nasabah'));
    }

    // public function detailRiwayatNasabah($userId)
    // {
    //     // Ambil transaksi nasabah berdasarkan user_id
    //     $Sampah = PesanNasabah::where('user_id', $userId)
    //         ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
    //         ->select('pesan_nasabah.*', 'lokasi_penjemputan.status')
    //         ->get();



    //     $cetakButton = new HtmlString('<a href="' . route('cetakPDFDetailRiwayat', ['user_id' => $userId]) . '" class="btn btn-primary">Cetak PDF</a>');
    //     // Mengembalikan view dengan detail pesanan nasabah
    //     return view('admin.detriwayatTransaksiNasabah', compact('Sampah', 'cetakButton'));
    // }

    public function detailRiwayatNasabah(Request $request, $userId)
    {
        // Ambil query builder untuk transaksi nasabah berdasarkan user_id
        $query = PesanNasabah::where('user_id', $userId)
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->select('pesan_nasabah.*', 'lokasi_penjemputan.status');

            
        // Filter berdasarkan tanggal
        if ($request->has('date') && $request->date) {
            $query->whereDate('pesan_nasabah.tanggal_pengumpulan', $request->date);
        }

        // Filter berdasarkan bulan
        if ($request->has('month') && $request->month) {
            $query->whereMonth('pesan_nasabah.tanggal_pengumpulan', $request->month);
        }

        // Filter berdasarkan tahun
        if ($request->has('year') && $request->year) {
            $query->whereYear('pesan_nasabah.tanggal_pengumpulan', $request->year);
        }

        // Eksekusi query
        $Sampah = $query->paginate(5);

        // Buat tombol cetak PDF
        // $cetakButton = new HtmlString('<a href="' . route('cetakPDFDetailRiwayat', ['user_id' => $userId]) . '" class="btn btn-primary">Cetak PDF</a>');


        // Buat tombol cetak PDF dengan parameter pencarian
        $cetakButton = new HtmlString('<a href="' . route(
            'cetakPDFDetailRiwayat',
            array_merge(
                ['user_id' => $userId],
                $request->only(['date', 'month', 'year'])
            )
        ) . '" class="btn btn-primary">Cetak PDF</a>');

        $user = Auth::user();
        // Mengembalikan view dengan detail pesanan nasabah
        return view('admin.detriwayatTransaksiNasabah', compact('user','userId', 'Sampah', 'cetakButton'));
    }

    public function cetakPDFDetailRiwayat(Request $request, $userId)
    {
        // Ambil query builder untuk transaksi nasabah berdasarkan user_id
        $query = PesanNasabah::where('user_id', $userId)
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->select('pesan_nasabah.*', 'lokasi_penjemputan.status');

        // Filter berdasarkan tanggal
        if ($request->has('date') && $request->date) {
            $query->whereDate('pesan_nasabah.tanggal_pengumpulan', $request->date);
        }

        // Filter berdasarkan bulan
        if ($request->has('month') && $request->month) {
            $query->whereMonth('pesan_nasabah.tanggal_pengumpulan', $request->month);
        }

        // Filter berdasarkan tahun
        if ($request->has('year') && $request->year) {
            $query->whereYear('pesan_nasabah.tanggal_pengumpulan', $request->year);
        }

        // Eksekusi query
        $Sampah = $query->get();

        // Load view untuk PDF
        $pdf = PDF::loadView('admin.cetakhistoryNasabah', compact('userId', 'Sampah'));

        // Return PDF
        return $pdf->download('detail_riwayat_transaksi_nasabah.pdf');
    }
    
    // public function cetakPDFDetailRiwayat($userId)
    // {

    //     // Ambil transaksi nasabah berdasarkan user_id
    //     $Sampah = PesanNasabah::where('user_id', $userId)
    //         ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
    //         ->select('pesan_nasabah.*', 'lokasi_penjemputan.status')
    //         ->get();

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
