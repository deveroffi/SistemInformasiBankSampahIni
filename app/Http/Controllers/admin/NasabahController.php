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

class NasabahController extends Controller
{
    public function tampillistNasabah()
    {
        // Mengambil semua user dari database
        // $users = User::all();
    
        // // Variabel untuk menyimpan path foto profil
        // $foto_profil = [];
    
        // // Memeriksa apakah pengguna memiliki foto profil dan menyimpan path foto profil ke dalam variabel
        // foreach ($users as $user) {
        //     // Memeriksa apakah pengguna memiliki foto profil
        //     if ($user->foto_profil) {
        //         $foto_profil[$user->id] = $user->foto_profil;
        //     } else {
        //         // Jika tidak ada foto profil, tetapkan nilai null
        //         $foto_profil[$user->id] = null;
        //     }
        // }
    
        $role = 'user';
    
        $Nasabah = NasabahSampah::getDataByRole($role)
            ->sortBy('name');
            $user = Auth::user();
        // Mengirimkan data Nasabah, pengguna, dan path foto profil ke view
        return view('admin.dataNasabah', compact('user','Nasabah'));
    }
    

    public function tampildatatransaksiNasabah()
    {
        return view('admin.datatransaksiNasabah', [

        ]);
    }

    public function tampileditProfil()
    {
        return view('nasabah.editProfil', [

        ]);
    }

    public function tampiltambahNasabah()
    {
        return view('admin.tambahNasabah', [

        ]);
    }

    // CRUD Nasabah
    public function storeNasabah(Request $request)
    { {
            // Validasi data input jika diperlukan
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
                'password' => 'required',
                'role' => 'required',
                // Tambahkan validasi untuk input lainnya
            ]);

            // Simpan data nasabah
            User::create([

                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'alamat' => $request->input('alamat'),
                'telepon' => $request->input('telepon'),
                'password' => Hash::make($request->password),
                'role' => $request->input('role'),
                // Tambahkan field lainnya sesuai kebutuhan
            ]);

            // Redirect atau berikan respons sesuai kebutuhan
            return redirect()->route('listNasabah')->with('pesan_success', 'Nasabah berhasil ditambahkan');
        }



    }

    public function editNasabah($id)
    {
        $nasabah = NasabahSampah::find($id);
        return view('nasabah.edit', compact('nasabah'));
    }

    public function updateNasabah(Request $request, $id)
    {
        //dd($request->all());
        $nasabah = NasabahSampah::find($id);

        // Validasi input sesuai kebutuhan
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
            // Field lainnya ...
        ]);

        // Update data nasabah
        $nasabah->update($request->all());

        return redirect()->back()->with('pesan_success', 'Data nasabah berhasil diubah.');
    }

    public function detailNasabah($id)
    {
        // Temukan data nasabah berdasarkan ID
        $nasabah = NasabahSampah::find($id);

        // dd($nasabah);

        if (!$nasabah) {
            // Handle jika nasabah tidak ditemukan
            abort(404);
        }

        $detailNasabah = $nasabah->getDetail();

        return view('nasabah.detail', compact('detailNasabah'));

    }

    public function delete($id)
    {
        // Temukan data nasabah berdasarkan ID
        $nasabah = NasabahSampah::find($id);

        // if (!$nasabah) {
        //     // Handle jika data tidak ditemukan
        //     return redirect()->back()->with('error', 'Data nasabah tidak ditemukan.');
        // }

        // Hapus data nasabah
        $nasabah->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data nasabah berhasil dihapus.');
    }

}
