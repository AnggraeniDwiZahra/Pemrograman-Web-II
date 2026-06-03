<?php

namespace Database\Seeders;

use App\Models\Profile; 
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'nama' => 'Anggraeni Dwi Zahra',
            'nim'          => '2410817220018', 
            'prodi'   => 'Teknologi Informasi',
            'hobi'         => 'Membaca',
            'skill'        => 'Java, Kotlin, PHP, Web Development',
            'gambar'       => 'profile1.jpeg', 
        ]);
    }
}