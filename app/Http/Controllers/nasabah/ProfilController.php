<?php

namespace App\Http\Controllers\nasabah;

use App\Http\Controllers\Controller;
use App\Models\PesanNasabah;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function tampilnasabah()
    {
        $user = Auth::user();
        $userId = Auth::id();

        // Ambil semua transaksi nasabah berdasarkan id pengguna
        $transaksis = PesanNasabah::where('user_id', $userId)->get();

        return view(
            'nasabah.nasabah',
            compact('transaksis')

        );
    }

    public function tampileditProfil()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        $transaksis = PesanNasabah::where('user_id', $user->id)->get();

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

        // Periksa kecocokan password saat ini jika ada input password baru
        if ($request->filled('new_password')) {
            if (!Hash::check($request->password, $user->password)) {
                // Jika tidak cocok, berikan pesan error
                return redirect()->back()->with('error', 'Password saat ini tidak sesuai.');
            }
        }

        // Memperbarui data pengguna dengan data yang baru, kecuali password
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->telepon = $request->telepon;

        // Memperbarui password jika dimasukkan
        if ($request->filled('new_password')) {
            // Enkripsi dan simpan password baru
            $user->password = Hash::make($request->new_password);
        }

        // Simpan perubahan
        $user->save();

        // Update data nasabah
        return redirect()->back()->with('pesan_success', 'Profil berhasil diperbarui.');
    }


    // public function updateProfil(Request $request)
    // {
    //     // Mendapatkan data pengguna yang sedang login
    //     $user = Auth::user();


    //     // Validasi input
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'alamat' => 'required|string|max:255',
    //         'telepon' => 'required|string|max:15',
    //         'password' => 'nullable|string',
    //         'new_password' => 'nullable|string|confirmed', // Konfirmasi password baru
    //     ]);

    //     // Periksa kecocokan password saat ini
    //     if (!Hash::check($request->password, $user->password)) {
    //         // Jika tidak cocok, berikan pesan error
    //         return redirect()->back()->with('error', 'Password saat ini tidak sesuai.');
    //     }

    //     // Memperbarui data pengguna dengan data yang baru, kecuali password
    //     $user->update($request->all());

    //     // Memperbarui password jika dimasukkan
    //     if ($request->filled('new_password')) {
    //         // Enkripsi dan simpan password baru
    //         $user->password = bcrypt($request->new_password);
    //         $user->save();
    //     }

    //     // Update data nasabah
    //     return redirect()->back()->with('pesan_success', 'Profil berhasil diperbarui.');
    // }





    public function updateProfilePicture(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);

        // Mendapatkan pengguna yang sedang masuk
        $user = Auth::user();

        // Mengambil file yang diunggah
        $foto_profil = $request->file('foto_profil');
        $fileName = time() . '_' . $foto_profil->getClientOriginalName();
        $foto_profil->storeAs('public', $fileName);

        // Simpan nama file di kolom 'foto_profil' di tabel 'users'
        $user->foto_profil = $fileName;
        $user->save();

        // Redirect atau berikan respons sukses
        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }

}
