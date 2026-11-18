<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator K3',
            'email' => 'admin@sikapsawit.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Budi Santoso (Pengawas)',
            'email' => 'pengawas@sikapsawit.com',
            'password' => Hash::make('password123'),
            'role' => 'pengawas',
            'blok_kerja' => 'Afdeling I - Blok A',
        ]);

        User::create([
            'name' => 'Ahmad Supriadi (Pekerja)',
            'email' => 'pekerja@sikapsawit.com',
            'password' => Hash::make('password123'),
            'role' => 'pekerja',
            'blok_kerja' => 'Blok A-01',
        ]);
    }
}