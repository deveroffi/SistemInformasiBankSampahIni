<?php

namespace App\Http\Controllers\nasabah;

use App\Http\Controllers\Controller;
use App\Models\hargaSampah;
use Illuminate\Http\Request;
use App\Models\LokasiPenjemputan;
use App\Models\PesanNasabah;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RewardController extends Controller
{
    public function tampilreward()
    {
        $user = Auth::user();
        $userId = Auth::id();

        //Ambil transaksi nasabah berdasarkan id pengguna
        $Sampah = PesanNasabah::where('user_id', $userId)
            ->whereHas('lokasiPenjemputan', function ($query) {
                $query->where('status', 'selesai');
            })
            ->with([
                'lokasiPenjemputan' => function ($query) {
                    $query->select('no_reff', 'status');
                },
                'hargaSampah' => function ($query) {
                    $query->select('jenis_sampah', 'harga');
                }
            ])

            ->get();

        $notif = PesanNasabah::where('user_id', $userId)
            ->whereHas('lokasiPenjemputan', function ($query) {
                $query->where('status', 'disetujui');
            })
            ->get();

        foreach ($Sampah as $transaksi) {
            $hargaSampah = $transaksi->hargaSampah;
            if ($hargaSampah) {
                $transaksi->harga_sampah = $hargaSampah->harga;
            } else {
                $transaksi->harga_sampah = 0; // Atau nilai default lainnya
            }
        }



        // Ambil transaksi yang telah disetujui
        $transaksis = PesanNasabah::where('user_id', $userId)
            ->whereHas('lokasiPenjemputan', function ($query) {
                $query->where('status', 'selesai');
            })
            ->get();

        $totalReward = 0;

        // Iterasi setiap transaksi
        foreach ($transaksis as $transaksi) {
            // Ambil jenis sampah dari transaksi
            $userId = $transaksi->user_id;

            // Ambil saldo saat ini dari tabel users berdasarkan user_id
            $user = User::find($userId);


            $jenisSampah = $transaksi->jenis_sampah;

            // Cari harga sampah berdasarkan jenis sampah
            $hargaSampah = HargaSampah::where('jenis_sampah', $jenisSampah)->first();

            // Jika harga sampah ditemukan
            if ($hargaSampah) {
                $transaksi->harga_sampah = $hargaSampah->harga;

                // Hitung total harga transaksi
                $totalHargaTransaksi = $hargaSampah->harga;

                // Tambahkan ke total reward
                $totalReward += $totalHargaTransaksi;

                $user->saldo = $totalReward;
                $user->save();
            }
        }
        $transaksiss = PesanNasabah::where('user_id', $userId)
        
        ->get();

        // Simpan total reward ke dalam kolom saldo pada tabel users

        return view('nasabah.reward', compact('notif', 'user','transaksiss', 'transaksis', 'Sampah', 'totalReward'));
    }
}
