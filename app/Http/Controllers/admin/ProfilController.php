<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function tampileditProfil()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = auth::user();

        

        // Variabel untuk menyimpan path foto profil
        $foto_profil = null;

        if ($user->foto_profil) {
            // Jika ada, simpan path foto profil ke variabel
            $foto_profil = $user->foto_profil;
        }

        // Kembalikan tampilan Blade yang menampilkan form edit profil dan foto profil
        return view('nasabah.editProfil', compact('transaksis', 'user', 'foto_profil'));
    }


    public function updateProfil(Request $request)
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();


        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'password' => 'nullable|string',
            'new_password' => 'nullable|string|confirmed', // Konfirmasi password baru
        ]);

        // Periksa kecocokan password saat ini
        if (!hash::check($request->password, $user->password)) {
            // Jika tidak cocok, berikan pesan error
            return redirect()->back()->with('error', 'Password saat ini tidak sesuai.');
        }

        // Memperbarui data pengguna dengan data yang baru, kecuali password
        $user->update($request->all());

        // Memperbarui password jika dimasukkan
        if ($request->filled('new_password')) {
            // Enkripsi dan simpan password baru
            $user->password = bcrypt($request->new_password);
            $user->save();
        }

        // Update data nasabah
        return redirect()->back()->with('pesan_success', 'Profil berhasil diperbarui.');
    }



}
