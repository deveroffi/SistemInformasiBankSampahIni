<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hargaSampah extends Model
{
    protected $table = 'harga_sampah';

    protected $fillable = [
        'kode',
        'jenis_sampah',
        'harga',
    ];

    public function jenisSampah()
    {
        return $this->hasOne(PesanNasabah::class, 'jenis_sampah', 'jenis_sampah');
    }
}
