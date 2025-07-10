<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NasabahSampah;
use App\Models\PesanNasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeAdminController extends Controller
{
    public function tampilhomeAdmin()
    {

        $role = 'user';
        $Nasabah = NasabahSampah::getDataByRole($role);
        $totalSampahPlastik = PesanNasabah::where('jenis_sampah', 'plastik')->count();
        $totalSampahKertas = PesanNasabah::where('jenis_sampah', 'kertas')->count();
        $totalSampahLainnya = PesanNasabah::
            whereNotIn('jenis_sampah', ['kertas', 'plastik'])
            ->count();
        $totalSampah = PesanNasabah::count();
        $totalTransaksiPerTanggal = DB::table('pesan_nasabah')
            ->select(DB::raw('DATE(tanggal_pengumpulan) as tanggal'), DB::raw('COUNT(*) as total_transaksi'))
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        //dd($Nasabah);
        $user = Auth::user();
        // Lakukan sesuatu dengan data yang telah diambil
        return view('myhome', compact('user','totalTransaksiPerTanggal', 'Nasabah', 'totalSampahPlastik', 'totalSampahKertas', 'totalSampahLainnya', 'totalSampah'));

    }
    public function showNasabahList()
{
    $role = 'user';
    $nasabah = NasabahSampah::nasabah($role, 5);

    return view('myhome', compact('nasabah'));
}
}
