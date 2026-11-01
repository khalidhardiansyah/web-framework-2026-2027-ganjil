<?php

namespace App\Models;

use Database\Factories\PeranFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['nama', 'slug', 'deskripsi'])]
class Peran extends Model
{
    /** @use HasFactory<PeranFactory> */
    use HasFactory;

    /**
     * Nama tabel database.
     *
     * @var string
     */
    protected $table = 'peran';

    /**
     * Relasi ke pengguna (User) yang memiliki peran ini.
     */
    public function pengguna(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'pengguna_peran',
            'peran_id',
            'pengguna_id'
        );
    }

    /**
     * Alias relasi dalam bahasa Inggris (users).
     */
    public function users(): BelongsToMany
    {
        return $this->pengguna();
    }

    /**
     * Relasi ke hak akses yang dimiliki oleh peran ini.
     */
    public function hakAkses(): BelongsToMany
    {
        return $this->belongsToMany(
            HakAkses::class,
            'peran_hak_akses',
            'peran_id',
            'hak_akses_id'
        );
    }

    /**
     * Alias relasi dalam bahasa Inggris (permissions).
     */
    public function permissions(): BelongsToMany
    {
        return $this->hakAkses();
    }

    /**
     * Berikan hak akses ke peran ini.
     */
    public function beriHakAkses(HakAkses|string $hakAkses): void
    {
        if (is_string($hakAkses)) {
            $hakAkses = HakAkses::firstOrCreate(
                ['slug' => $hakAkses],
                ['nama' => ucwords(str_replace('-', ' ', $hakAkses))]
            );
        }

        $this->hakAkses()->syncWithoutDetaching([$hakAkses->id]);
    }

    /**
     * Alias beriHakAkses dalam bahasa Inggris.
     */
    public function givePermission(HakAkses|string $permission): void
    {
        $this->beriHakAkses($permission);
    }

    /**
     * Periksa apakah peran memiliki hak akses tertentu berdasarkan slug.
     */
    public function memilikiHakAkses(string $slug): bool
    {
        if ($this->relationLoaded('hakAkses')) {
            return $this->hakAkses->contains('slug', $slug);
        }

        return $this->hakAkses()->where('slug', $slug)->exists();
    }

    /**
     * Alias memilikiHakAkses dalam bahasa Inggris.
     */
    public function hasPermission(string $slug): bool
    {
        return $this->memilikiHakAkses($slug);
    }
}
