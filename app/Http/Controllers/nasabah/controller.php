foreach ($transaksis as $transaksi) {
            // Ambil jenis sampah dari transaksi
            $userId = $transaksi->user_id;
    
            // Ambil saldo saat ini dari tabel users berdasarkan user_id
            $user = User::find($userId);
    
            $jenisSampah = $transaksi->jenis_sampah;
    
            // Cari harga sampah berdasarkan jenis sampah
            $hargaSampah = HargaSampah::where('jenis_sampah', $jenisSampah)->first();
    
            // Ambil berat sampah yang diperbarui dari tabel pesan_nasabah
            $beratSampahDiperbarui = $transaksi->berat_sampah;
    
            // Jika harga sampah ditemukan
            if ($hargaSampah) {
                $transaksi->harga_sampah = $hargaSampah->harga;
    
                // Hitung total harga transaksi
                $totalHargaTransaksi = $hargaSampah->harga * $beratSampahDiperbarui;
    
                // Tambahkan ke total reward
                $totalReward += $totalHargaTransaksi;
    
                $user->saldo = $totalReward;
                $user->save();
            }
        }
        