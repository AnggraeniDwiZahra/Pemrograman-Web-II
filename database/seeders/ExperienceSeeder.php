<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul'     => 'Master of Ceremony (MC) Webinar Kewirausahaan', 
                'deskripsi' => 'Menjadi MC dalam acara webinar kewirausahaan mahasiswa yang membahas peluang bisnis untuk Gen-Z. Acara ini menghadirkan narasumber Reza Pahlevi dan turut dihadiri oleh Bapak Ibnu Sina.',
                'waktu'     => 'Juli 2025',
                'gambar'    => 'webinar_mc.jpeg',
                'kesan'     => 'Pengalaman pertama kali memandu acara formal yang cukup besar. Sempat gugup, tapi bersyukur bisa berjalan dengan lancar.'
            ],
            [
                'judul'     => 'Perancangan Web Smart Travel Assistant', 
                'deskripsi' => 'Membuat rancangan antarmuka (UI/UX) untuk platform asisten perjalanan pintar. Proses pengerjaan menggunakan Figma, mulai dari penyusunan alur pengguna hingga pembuatan prototipe interaktif.',
                'waktu'     => 'Desember 2025',
                'gambar'    => 'travel_assistant.png',
                'kesan'     => 'Belajar cara menyusun tata letak aplikasi yang ramah pengguna dan melihat bagaimana alur sebuah sistem bekerja sebelum di-coding.'
            ],
            [
                'judul'     => 'Pengembangan Aplikasi KiDaily', 
                'deskripsi' => 'Membangun aplikasi desktop bernama KiDaily menggunakan bahasa pemrograman Java. Aplikasi ini berfungsi sebagai alat bantu untuk memanajemen jadwal dan aktivitas harian anak.',
                'waktu'     => 'Desember 2025',
                'gambar'    => 'kidaily_app.jpeg',
                'kesan'     => 'Melatih logika pemrograman, khususnya dalam menerapkan konsep Object-Oriented Programming (OOP) menggunakan Java.'
            ],
            [
                'judul'     => 'Pengembangan Website dengan Framework Laravel', 
                'deskripsi' => 'Mempelajari dasar-dasar backend dengan menghubungkan database MySQL ke tampilan web menggunakan Laravel. Proyek ini mencakup migrasi tabel, seeder, dan penampilan data secara dinamis.',
                'waktu'     => 'Juni 2026',
                'gambar'    => 'laravel_prak.png',
                'kesan'     => 'Memberikan gambaran dasar mengenai alur kerja backend development dan bagaimana mengelola data web secara dinamis.'
            ],
        ];

        foreach ($data as $item) {
            Experience::create($item);
        }
    }
}