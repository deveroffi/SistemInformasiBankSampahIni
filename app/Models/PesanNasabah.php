<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LokasiPenjemputan;

class PesanNasabah extends Model
{
    use HasFactory;
    protected $table = 'pesan_nasabah'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'no_reff'; 
    protected $fillable = ['user_id','jenis_sampah', 'berat_sampah', 'tanggal_pengumpulan', 'lokasi_maps','foto_sampah'];

    public function catatan()
{
    return $this->hasOne(Catatan::class, 'no_reff', 'no_reff'); // Ganti foreign_key dan local_key dengan kunci yang sesuai
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public static function getDataByRole($role)
    {
        return self::where('role', $role)->get();
    }

    public function lokasiPenjemputan()
    {
        return $this->hasOne(LokasiPenjemputan::class, 'no_reff', 'no_reff');
    }

    public function jenisSampah()
    {
        return $this->hasOne(hargaSampah::class, 'jenis_sampah', 'jenis_sampah');
    }
   
    public function hargaSampah()
    {
        return $this->hasOne(HargaSampah::class, 'jenis_sampah', 'jenis_sampah');
    }

 
}
