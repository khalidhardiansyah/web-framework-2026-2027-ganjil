<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tabel Peran (Roles)
        Schema::create('peran', function (Blueprint $table) {
            $table->id();
            $table->string('nama');               // Contoh: "Administrator", "Manager", "Mahasiswa"
            $table->string('slug')->unique();     // Contoh: "admin", "manager", "user"
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 2. Tabel Hak Akses (Permissions)
        Schema::create('hak_akses', function (Blueprint $table) {
            $table->id();
            $table->string('nama');               // Contoh: "Akses Menu Admin", "Kelola Pengguna"
            $table->string('slug')->unique();     // Contoh: "akses-admin", "kelola-pengguna"
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // 3. Tabel Pivot Pengguna & Peran (User Roles)
        Schema::create('pengguna_peran', function (Blueprint $table) {
            $table->foreignId('pengguna_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('peran_id')
                ->constrained('peran')
                ->cascadeOnDelete();

            $table->primary(['pengguna_id', 'peran_id']);
        });

        // 4. Tabel Pivot Peran & Hak Akses (Role Permissions)
        Schema::create('peran_hak_akses', function (Blueprint $table) {
            $table->foreignId('peran_id')
                ->constrained('peran')
                ->cascadeOnDelete();
            $table->foreignId('hak_akses_id')
                ->constrained('hak_akses')
                ->cascadeOnDelete();

            $table->primary(['peran_id', 'hak_akses_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peran_hak_akses');
        Schema::dropIfExists('pengguna_peran');
        Schema::dropIfExists('hak_akses');
        Schema::dropIfExists('peran');
    }
};
