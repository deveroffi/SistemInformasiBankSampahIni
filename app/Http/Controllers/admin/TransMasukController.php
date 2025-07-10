<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PesanNasabah;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use App\Models\homeAdmin;
use App\Models\LokasiPenjemputan;
use App\Models\NasabahSampah;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PesananDisetujuiNotification;
use App\Mail\TransaksiDisetujui;
use Illuminate\Support\Facades\Mail;

class TransMasukController extends Controller
{
    public function tampiltransaksiMasukNasabah()
    {
        $user = Auth::user();
        $totalSampahPlastik = PesanNasabah::where('jenis_sampah', 'plastik')->count();
        $totalSampahKertas = PesanNasabah::where('jenis_sampah', 'kertas')->count();
        $totalSampahLainnya = PesanNasabah::
            whereNotIn('jenis_sampah', ['kertas', 'plastik'])
            ->count();

        $Sampah = DB::table('pesan_nasabah')
            ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->select(
                'pesan_nasabah.*',
                'users.name as name',
                'foto_sampah as foto_sampah',
                'lokasi_penjemputan.lokasi',
                'lokasi_penjemputan.koordinat',
                'lokasi_penjemputan.status' // Tambahkan kolom 'status' dari tabel 'lokasi_penjemputan'
            )
            ->get();


        foreach ($Sampah as $sampah) {
            if ($sampah->koordinat) {
                $jarak = $this->hitungJarak($sampah->koordinat);
                $sampah->jarak = $jarak;
            } else {
                // Jika tidak ada latitude dan longitude, berikan nilai default
                $sampah->jarak = null;
            }
            // Jika status belum diatur, atur nilai default menjadi "belum disetujui"
            if ($sampah->status === null) {
                $sampah->status = 'Belum Disetujui';
            }
        }

        // Buat instance koleksi baru dan urutkan
        $Sampah = collect($Sampah)->sortBy('no_reff');



        return view('admin.transaksiMasuk', compact('user', 'Sampah', 'totalSampahPlastik', 'totalSampahKertas', 'totalSampahLainnya'));
    }



    private function hitungJarak($koordinat)
    {
        // Koordinat tujuan (UINSA)
        $tujuan_latitude = -7.322191655237305;
        $tujuan_longitude = 112.73470170620698;

        // Radius bumi dalam kilometer
        $radius_bumi = 6371000;

        // Pisahkan nilai latitude dan longitude menggunakan koma
        list($latitude, $longitude) = explode(',', $koordinat);

        // Simpan nilai latitude dan longitude dalam model LokasiPenjemputan


        // Konversi derajat ke radian
        $latitude_radian = deg2rad($latitude);
        $tujuan_latitude_radian = deg2rad($tujuan_latitude);
        $selisih_latitude = deg2rad($tujuan_latitude - $latitude);
        $selisih_longitude = deg2rad($tujuan_longitude - $longitude);

        $a = sin($selisih_latitude / 2) * sin($selisih_latitude / 2) + cos($latitude_radian) * cos($tujuan_latitude_radian) * sin($selisih_longitude / 2) * sin($selisih_longitude / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $jarak = $radius_bumi * $c;

        $lokasiPenjemputan = LokasiPenjemputan::firstOrNew([
            'koordinat' => $koordinat

        ]);

        // Set nilai jarak ke dalam atribut 'jarak' pada model
        $lokasiPenjemputan->jarak = $jarak;

        // Simpan model LokasiPenjemputan
        $lokasiPenjemputan->save();
        return $jarak;
    }




    public function cetakPDFTransaksiMasuk()
    {
        $Sampah = DB::table('pesan_nasabah')
            ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.no_reff', '=', 'lokasi_penjemputan.no_reff')
            ->select('pesan_nasabah.*', 'users.name as name', 'lokasi_penjemputan.lokasi','lokasi_penjemputan.status', 'lokasi_penjemputan.koordinat')
            ->where('lokasi_penjemputan.status', 'selesai')
            ->get();

            foreach ($Sampah as $sampah) {
                if ($sampah->koordinat) {
                    $jarak = $this->hitungJarak($sampah->koordinat);
                    $sampah->jarak = $jarak;
                } else {
                    // Jika tidak ada latitude dan longitude, berikan nilai default
                    $sampah->jarak = null;
                }
               
            }
        // foreach ($Sampah as $sampah) {
        //     if ($sampah->latitude && $sampah->longitude) {
        //         $jarak = $this->hitungJarak($sampah->koordinat);
        //         $sampah->jarak = $jarak;
        //     } else {
        //         // Jika tidak ada latitude dan longitude, berikan nilai default
        //         $sampah->jarak = null;
        //     }
        // }

        // Buat instance koleksi baru dan urutkan
        $Sampah = collect($Sampah)->sortBy('jarak');

        // Render view ke dalam HTML
        $html = view('admin.cetaktransaksiMasuk', compact('Sampah'))->render();

        // Konfigurasi PDF
        $pdf = PDF::loadHTML($html);

        // Set nama file dengan tanggal
        $tanggal = Carbon::now()->format('Y-m-d'); // Format tanggal
        $filename = 'laporan_transaksi_masuk_' . $tanggal . '.pdf';

        // Mengatur posisi kertas menjadi horizontal (landscape)
        $pdf->setPaper('landscape');

        // Render PDF dan kirim sebagai response
        return $pdf->download($filename);
    }



    public function detailtransaksiMasukNasabah($no_reff)
    {
        // Temukan data nasabah berdasarkan nomor referensi
        $sampah = DB::table('pesan_nasabah')
            ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
            ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.user_id', '=', 'lokasi_penjemputan.user_id') // Menggunakan LEFT JOIN agar data tetap tampil jika tidak ada lokasi_penjemputan
            ->select('pesan_nasabah.*', 'users.name as name','foto_sampah as foto_sampah', 'lokasi_penjemputan.lokasi', 'lokasi_penjemputan.latitude', 'lokasi_penjemputan.longitude', 'lokasi_penjemputan.jarak', 'lokasi_penjemputan.koordinat')
            ->where('pesan_nasabah.no_reff', $no_reff) // Filter berdasarkan nomor referensi
            ->first(); // Ambil data pertama

        if (!$sampah) {
            // Handle jika data tidak ditemukan
            return abort(404);
        }

        // Kirim data ke view untuk ditampilkan
        return view('nasabah.detail', compact('sampah'));
    }

    public function updateStatus()
    {
        // Temukan data nasabah berdasarkan nomor referensi
        $sampah = LokasiPenjemputan::where('no_reff', request()->no_reff)->first();

        if (!$sampah) {
            // Handle jika data tidak ditemukan
            return abort(404);
        }


        // Update status menjadi "disetujui"

        $sampah->update([
            'status' => 'disetujui',
            'koordinat' => request()->koordinat,
            'latitude' => request()->latitude,
            'longitude' => request()->longitude
        ]);


        // $user = $sampah->user;
        //  // Asumsikan ada relasi 'user' di model LokasiPenjemputan
        // if ($user) {
        //     Mail::to($user->email)->send(new TransaksiDisetujui($sampah->no_reff));
        // }





        // Redirect atau kirim respons JSON sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }





    // public function edittransaksiMasukNasabah($no_reff)
    // {
    //     $sampah = DB::table('pesan_nasabah')
    //         ->join('users', 'pesan_nasabah.user_id', '=', 'users.id')
    //         ->leftJoin('lokasi_penjemputan', 'pesan_nasabah.user_id', '=', 'lokasi_penjemputan.user_id') // Menggunakan LEFT JOIN agar data tetap tampil jika tidak ada lokasi_penjemputan
    //         ->select('pesan_nasabah.*', 'users.name as name', 'lokasi_penjemputan.lokasi', 'lokasi_penjemputan.latitude', 'lokasi_penjemputan.longitude', 'lokasi_penjemputan.jarak')
    //         ->get(); // Menggunakan first() karena Anda mengambil satu baris saja

    //     // $detailSampah = $sampah->getDetail();
    //     return view('sampah.edit', compact('sampah'));
    // }
    public function editTransaksiMasuknasabah($no_reff)
    {
        $sampah = PesanNasabah::find($no_reff);
        // $user = Auth::user();

        return view('sampah.edit', compact('sampah'));
    }



    public function updateTransaksiMasukNasabah(Request $request)
    {

        try {
            $user = Auth::user();
            $no_reff = $request->input('no_reff');

            // Periksa apakah data ditemukan
            $sampah = PesanNasabah::where('no_reff', $no_reff)->first();

            if (!$sampah) {
                // Handle jika data tidak ditemukan
                return redirect()->back()->with('error', 'Data sampah tidak ditemukan.');
            }

            // Validasi data input jika diperlukan
            $request->validate([
                'jenis_sampah' => 'required',
                'berat_sampah' => 'required|numeric',
                'tanggal_pengumpulan' => 'required|date',
                'lokasi_maps' => 'nullable|string',
                'koordinat' => 'nullable|string',
            ]);

            // Update data transaksi dengan data yang baru
            $sampah->update([
                'jenis_sampah' => $request->jenis_sampah,
                'berat_sampah' => $request->berat_sampah,
                'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
                'lokasi_maps' => $request->lokasi_maps,
                'koordinat' => $request->koordinat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            // Update data lokasi_penjemputan dengan data yang baru
            $lokasiPenjemputan = LokasiPenjemputan::updateOrCreate(
                ['pesan_nasabah_id' => $sampah->id],
                [
                    'user_id' => $user->id,
                    'pesan_nasabah_id' => $sampah->id,
                    'lokasi' => $request->lokasi_maps,
                    'koordinat' => $request->koordinat,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    // tambahkan field lain sesuai kebutuhan
                ]
            );

            return redirect()->back()->with('success', 'Data sampah berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangkap dan tangani exception jika terjadi kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function saveCoordinates(Request $request)
    {
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Simpan data ke database atau lakukan sesuatu dengan data
        // Contoh:
        // Location::create([
        //     'latitude' => $validated['latitude'],
        //     'longitude' => $validated['longitude'],
        // ]);

        return redirect()->back()->with('success', 'Coordinates saved successfully.');
    }

  
}
