<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ['id','name','foto_profil', 'email',
    'alamat','telepon', 'password', 'role','saldo'];
        {
            $data = [
                ['id' => '1', 'name' => 'Admin BSS', 'email' => 'admin@gmail.com', 'alamat' => 'Jl. Ahmad Yani, Kecamatan Wonocolo No. 117', 'telepon' => '121212112121', 'password' => 'adminadmin', 'role' => 'admin'],
               
            ];
    
            foreach ($data as $item) {
                User::create($item);
            }
        }
    }
}
