<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('xEYnws6y'), // Ganti dengan password yang diinginkan
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pimpinan User',
                'email' => 'pimpinan@gmail.com',
                'password' => Hash::make('xEYnws6y'), // Ganti dengan password yang diinginkan
                'role' => 'pimpinan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
