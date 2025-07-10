<?php

namespace App\Http\Controllers\nasabah;
use App\Models\PesanNasabah;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SampahController extends Controller
{
    public function tampilinfo()
    {
        $userId = auth::id();
        $user = Auth::user();
        // Ambil semua transaksi nasabah berdasarkan id pengguna
        $transaksis = PesanNasabah::where('user_id', $userId)->get();
        return view('nasabah.info', compact('user','transaksis')

        );
    }
}
