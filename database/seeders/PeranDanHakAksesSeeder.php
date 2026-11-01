<?php

namespace Database\Seeders;

use App\Models\HakAkses;
use App\Models\Peran;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PeranDanHakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat Data Peran (Roles)
        $peranAdmin = Peran::firstOrCreate(
            ['slug' => 'admin'],
            [
                'nama' => 'Administrator',
                'deskripsi' => 'Akses penuh ke seluruh sistem, menu admin, dan manajemen pengguna.',
            ]
        );

        $peranManager = Peran::firstOrCreate(
            ['slug' => 'manager'],
            [
                'nama' => 'Manager',
                'deskripsi' => 'Akses ke menu manajemen, pemantauan laporan, dan sumber daya tim.',
            ]
        );

        $peranUser = Peran::firstOrCreate(
            ['slug' => 'user'],
            [
                'nama' => 'Mahasiswa / User',
                'deskripsi' => 'Akses ke dashboard dasar dan materi perkuliahan praktikum.',
            ]
        );

        // 2. Buat Data Hak Akses (Permissions)
        $hakAksesAdmin = HakAkses::firstOrCreate(
            ['slug' => 'akses-admin'],
            ['nama' => 'Akses Menu Admin', 'deskripsi' => 'Izin untuk membuka modul dan rute khusus administrator.']
        );

        $hakAksesManager = HakAkses::firstOrCreate(
            ['slug' => 'akses-manager'],
            ['nama' => 'Akses Menu Manager', 'deskripsi' => 'Izin untuk membuka modul dan laporan manajerial.']
        );

        $hakAksesUser = HakAkses::firstOrCreate(
            ['slug' => 'akses-user'],
            ['nama' => 'Akses Menu User', 'deskripsi' => 'Izin untuk mengakses materi dan dashboard mahasiswa/user.']
        );

        $hakKelolaPengguna = HakAkses::firstOrCreate(
            ['slug' => 'kelola-pengguna'],
            ['nama' => 'Kelola Pengguna', 'deskripsi' => 'Izin untuk mengelola data akun pengguna dan peran.']
        );

        // 3. Hubungkan Hak Akses ke Peran
        // Admin memiliki semua hak akses
        $peranAdmin->hakAkses()->sync([
            $hakAksesAdmin->id,
            $hakAksesManager->id,
            $hakAksesUser->id,
            $hakKelolaPengguna->id,
        ]);

        // Manager memiliki akses menu manager dan user
        $peranManager->hakAkses()->sync([
            $hakAksesManager->id,
            $hakAksesUser->id,
        ]);

        // User / Mahasiswa memiliki akses user dasar
        $peranUser->hakAkses()->sync([
            $hakAksesUser->id,
        ]);

        // 4. Buat Akun Demonstrasi Default (Password: password123)
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Praktikum',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        $admin->peran()->sync([$peranAdmin->id]);

        $manager = User::firstOrCreate(
            ['email' => 'manager@example.com'],
            [
                'name' => 'Manager Praktikum',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        $manager->peran()->sync([$peranManager->id]);

        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Mahasiswa Praktikum',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        $user->peran()->sync([$peranUser->id]);
    }
}
