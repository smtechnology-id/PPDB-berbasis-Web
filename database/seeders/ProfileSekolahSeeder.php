<?php

namespace Database\Seeders;

use App\Models\ProfileSekolah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileSekolah::create([
            'nama_sekolah' => 'Sekolah Menengah Atas Contoh',
            'alamat' => 'Jl. Contoh No. 123, Jakarta',
            'akreditasi' => 'A',
            'kode_pos' => '12345'
        ]);
    }
}
