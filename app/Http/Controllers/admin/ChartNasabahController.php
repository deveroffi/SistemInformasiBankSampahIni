<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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

class ChartNasabahController extends Controller
{
    public function tampilchartNasabah()
    {

        $user = Auth::user();
        $totalSampahPlastik = PesanNasabah::where('jenis_sampah', 'plastik')->count();
        $totalSampahKertas = PesanNasabah::where('jenis_sampah', 'kertas')->count();
        $totalSampahLainnya = PesanNasabah::where('jenis_sampah', 'lainnya')->count();
        $totalSampahLainnya = PesanNasabah::
            whereNotIn('jenis_sampah', ['kertas', 'plastik'])
            ->count();
            
        $totalTransaksi = DB::table('pesan_nasabah')
            ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('COUNT(pesan_nasabah.user_id) as total_transaksi'))
            ->groupBy('users.name')
            ->orderByDesc('total_transaksi')
            ->get();

        $totalTransaksiPerTanggal = DB::table('pesan_nasabah')
            ->select(DB::raw('DATE(tanggal_pengumpulan) as tanggal'), DB::raw('COUNT(*) as total_transaksi'))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $totalAdmin = DB::table('users')->where('role', 'admin')->count();
        $totalUser = DB::table('users')->where('role', 'user')->count();

        $belumDisetujui = LokasiPenjemputan::where('status', 'belum disetujui')->count();
        $disetujui = LokasiPenjemputan::where('status', 'disetujui')->count();
        $selesai = LokasiPenjemputan::where('status', 'selesai')->count();

        $Sampah = DB::table('lokasi_penjemputan')->where('status', 'selesai')->get();

        


        //dd($Nasabah);

        // Lakukan sesuatu dengan data yang telah diambil
        // return view('myhome', compact('Nasabah', 'totalSampahPlastik', 'totalSampahKertas', 'totalSampahLainnya', 'totalSampah'));
        return view('admin.chartNasabah', compact('Sampah','user','selesai', 'disetujui', 'belumDisetujui', 'totalAdmin', 'totalUser', 'totalTransaksiPerTanggal', 'totalTransaksi', 'totalSampahPlastik', 'totalSampahKertas', 'totalSampahLainnya'));
    }
}
