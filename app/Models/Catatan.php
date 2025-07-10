<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $table = 'catatan'; // Nama tabel di database

    protected $fillable = ['no_reff', 'catatan']; // Kolom yang dapat diisi

    // Relasi ke model LokasiPenjemputan
   
    public function pesanNasabah()
{
    return $this->belongsTo(PesanNasabah::class, 'no_reff', 'no_reff'); // Ganti foreign_key dan local_key dengan kunci yang sesuai
}
}
