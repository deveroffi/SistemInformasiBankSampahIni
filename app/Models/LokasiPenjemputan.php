<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiPenjemputan extends Model
{
    protected $table = 'lokasi_penjemputan';

    protected $fillable = ['no_reff','koordinat','status','lokasi', 'koordinat','jarak'];

    public function nomor()
    {
        return $this->belongsTo(PesanNasabah::class, 'no_reff');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lokasiPenjemputan) {
            $lokasiPenjemputan->status = 'belum disetujui';
        });
    }
    
    public function pesanNasabah()
    {
        return $this->hasMany(PesanNasabah::class, 'no_reff', 'no_reff');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
