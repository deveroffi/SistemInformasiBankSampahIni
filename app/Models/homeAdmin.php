<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homeAdmin extends Model
{
    use HasFactory;

    protected $table = 'users'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'id'; // Ganti dengan primary key yang sesuai
    protected $fillable = ['name', 'email',
    'alamat','telepon', 'password', 'role'];

    
    // Metode untuk mengambil data berdasarkan kolom role
    public static function homeNasabah($role)
    {
        return self::where('role', $role)->get();
    }
}
