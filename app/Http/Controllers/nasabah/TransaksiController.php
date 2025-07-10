<?php

namespace App\Http\Controllers\nasabah;

use App\Http\Controllers\Controller;
use App\Models\LokasiPenjemputan;
use App\Models\PesanNasabah;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    public function tampiltransaksi()
    {
        $userId = Auth::id();
        $user = Auth::user();
        // Ambil transaksi nasabah berdasarkan id pengguna
        $Sampah = PesanNasabah::leftJoin('catatan', 'pesan_nasabah.no_reff', '=', 'catatan.no_reff')
            ->select('pesan_nasabah.*', 'catatan.catatan')
            ->where('pesan_nasabah.user_id', $userId)
            ->orderBy('pesan_nasabah.no_reff', 'desc')
            ->get();

        $transaksis = PesanNasabah::where('user_id', $userId)->get();

        // Ambil jumlah sampah berdasarkan jenis untuk pengguna yang sedang login
        $totalSampahPlastik = PesanNasabah::where('user_id', $userId)->where('jenis_sampah', 'plastik')->count();
        $totalSampahKertas = PesanNasabah::where('user_id', $userId)->where('jenis_sampah', 'kertas')->count();
        $totalSampahLainnya = PesanNasabah::where('user_id', $userId)
            ->whereNotIn('jenis_sampah', ['kertas', 'plastik'])
            ->count();

        $waktuTransaksi = Carbon::now()->hour;
        $batasWaktu = ($waktuTransaksi >= 5 && $waktuTransaksi <= 24);

        return view('nasabah.transaksi', compact('batasWaktu','user', 'transaksis', 'Sampah', 'totalSampahPlastik', 'totalSampahKertas', 'totalSampahLainnya'));
        // $userId = Auth::id();

        // // Ambil transaksi nasabah berdasarkan id pengguna
        // $Sampah = PesanNasabah::where('user_id', $userId)->get();

        // return view('nasabah.transaksi', compact('Sampah'));

        // //return view('nasabah.transaksi',compact('Sampah') 
    }

    public function tampildatatransaksi()
    {
        return view('nasabah.dataTransaksi', [

        ]);
    }

    public function storeTransaksi(Request $request)
    {
        $request->validate([
            'jenis_sampah' => 'required',
            'berat_sampah' => 'required|numeric',
            'tanggal_pengumpulan' => 'required|date',
            'lokasi_maps' => 'nullable|string',
            'foto_sampah' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $id = Auth::id();


        $foto_sampah = $request->file('foto_sampah');
        $fileName = time() . '_' . $foto_sampah->getClientOriginalName();
        $foto_sampah->storeAs('public', $fileName);


        // Simpan data ke dalam tabel 'pesan_nasabah'
        $pesanNasabah = PesanNasabah::create([
            'user_id' => $id,
            'no_reff' => $request->no_reff,
            'jenis_sampah' => $request->jenis_sampah,
            'berat_sampah' => $request->berat_sampah,
            'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
            'lokasi_maps' => $request->lokasi_maps,
            'jarak' => $request->jarak,
            'foto_sampah' => $fileName,


        ]);

        // Simpan data ke dalam tabel 'lokasi_penjemputan' dengan menyertakan 'pesan_nasabah_id'
        LokasiPenjemputan::create([
            'id' => $pesanNasabah->$id,
            'no_reff' => $pesanNasabah->no_reff, // Ambil no_reff dari pesan_nasabah
            'lokasi' => $request->lokasi_maps,

            // Sesuai dengan kebutuhan Anda, tambahkan field lain sesuai kebutuhan
        ]);
        // Validasi data input jika diperlukan
        // $request->validate([
        //     'jenis_sampah' => 'required',
        //     'berat_sampah' => 'required|numeric',
        //     'tanggal_pengumpulan' => 'required|date',
        //     'lokasi_maps' => 'nullable|string',
        // ]);


        // $user = Auth::user();

        // // Simpan data ke dalam database dengan menyertakan 'user_id'
        // PesanNasabah::create([
        //     'user_id' => $user->id, // Menyertakan user_id
        //     'jenis_sampah' => $request->jenis_sampah,
        //     'berat_sampah' => $request->berat_sampah,
        //     'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
        //     'lokasi_maps' => $request->lokasi_maps,
        // ]);

        // Redirect dengan pesan sukses
        return redirect()->route('transaksi')->with('success', 'Transaksi berhasil ditambahkan');


    }

    public function editTransaksi($no_reff)
    {
        $sampah = PesanNasabah::find($no_reff);
        $sampah = LokasiPenjemputan::find($no_reff);
        $user = Auth::user();

        return view('sampah.edit', compact('sampah'));
    }

    public function updateTransaksi(Request $request)
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
                'foto_sampah' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Jika ada file yang diunggah, proses dan simpan file tersebut
            if ($request->hasFile('foto_sampah')) {
                // Simpan nama file lama
                $oldFileName = $sampah->foto_sampah;

                // Ambil file yang diunggah
                $foto_sampah = $request->file('foto_sampah');

                // Buat nama file baru
                $fileName = time() . '_' . $foto_sampah->getClientOriginalName();

                // Simpan file ke direktori public
                $path = $foto_sampah->storeAs('public', $fileName);

                // Update kolom foto_sampah di database dengan nama file baru
                $sampah->foto_sampah = $fileName;
                $sampah->save();

                // Hapus file lama dari folder public jika ada
                if ($oldFileName) {
                    Storage::delete('public/' . $oldFileName);
                }
            }

            // Update data transaksi dengan data yang baru
            $sampah->update([
                'jenis_sampah' => $request->jenis_sampah,
                'berat_sampah' => $request->berat_sampah,
                'tanggal_pengumpulan' => $request->tanggal_pengumpulan,
                'lokasi_maps' => $request->lokasi_maps,
            ]);

            // Update data lokasi_penjemputan dengan data yang baru
            $lokasiPenjemputan = LokasiPenjemputan::updateOrCreate(
                ['pesan_nasabah_id' => $sampah->id],
                [
                    'user_id' => $user->id,
                    'pesan_nasabah_id' => $sampah->id,
                    'lokasi' => $request->lokasi_maps,
                    // 'latitude' => $request->latitude,
                    // 'longitude' => $request->longitude,
                    // tambahkan field lain sesuai kebutuhan
                ]
            );

            return redirect()->back()->with('success', 'Data sampah berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangkap dan tangani exception jika terjadi kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function detailTransaksi($no_reff)
    {
        // Temukan data nasabah berdasarkan ID
        $sampah = PesanNasabah::find($no_reff);

        // dd($nasabah);

        if (!$sampah) {
            // Handle jika nasabah tidak ditemukan
            abort(404);
        }

        $detailSampah = $sampah->getDetail();

        return view('sampah.detail', compact('detailSampah'));

    }

    public function delete($no_reff)
    {
        // Temukan data nasabah berdasarkan ID
        $sampah = PesanNasabah::find($no_reff);

        // if (!$nasabah) {
        //     // Handle jika data tidak ditemukan
        //     return redirect()->back()->with('error', 'Data nasabah tidak ditemukan.');
        // }

        // Hapus data nasabah
        $sampah->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data sampah berhasil dihapus.');
    }

    public function getLatLong(Request $request)
    {
        $lokasi_maps = $request->input('lokasi_maps');

        $lokasi_maps = $this->extractJalan($lokasi_maps);
        // Cari lokasi berdasarkan nama jalan

        $location = Location::where('lokasi_maps', 'like', '%' . $lokasi_maps . '%')->first();

        if ($location) {
            return response()->json([
                'latitude' => $location->latitude,
                'longitude' => $location->longitude,
            ]);
        } else {
            return response()->json(['error' => 'Lokasi tidak ditemukan'], 404);
        }
    }

    private function extractJalan($lokasi_maps)
    {
        // Jika input seringkali memiliki nama jalan di awal, ambil kata-kata pertama sampai koma
        if (strpos($lokasi_maps, ',') !== false) {
            return trim(strstr($lokasi_maps, ',', true));
        }
        // Atau jika nama jalan diikuti dengan spasi dan nomor jalan, Anda bisa menggunakan explode(' ') juga.
        return $lokasi_maps;
    }

    // public function hitungJarak(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'alamat_asal' => 'required',
    //         'alamat_tujuan' => 'required',
    //     ]);

    //     // Ambil alamat asal dan tujuan dari formulir
    //     $alamatAsal = $request->input('alamat_asal');
    //     $alamatTujuan = $request->input('alamat_tujuan');

    //     // Buat permintaan ke Google Distance Matrix API
    //     $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=' . urlencode($alamatAsal) . '&destinations=' . urlencode($alamatTujuan) . '&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w';
    //     $response = file_get_contents($url);
    //     $data = json_decode($response);

    //     if ($data->status === 'OK') {
    //         $jarak = $data->rows[0]->elements[0]->distance->text;
    //         return view('result', ['jarak' => $jarak]);
    //     } else {
    //         return redirect()->back()->with('error', 'Tidak dapat menghitung jarak. Pastikan alamat yang dimasukkan valid.');
    //     }
    // }
}
