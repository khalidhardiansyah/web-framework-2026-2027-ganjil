<?php

namespace App\Models;

use Database\Factories\HakAksesFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['nama', 'slug', 'deskripsi'])]
class HakAkses extends Model
{
    /** @use HasFactory<HakAksesFactory> */
    use HasFactory;

    /**
     * Nama tabel database.
     *
     * @var string
     */
    protected $table = 'hak_akses';

    /**
     * Relasi ke peran yang memiliki hak akses ini.
     */
    public function peran(): BelongsToMany
    {
        return $this->belongsToMany(
            Peran::class,
            'peran_hak_akses',
            'hak_akses_id',
            'peran_id'
        );
    }

    /**
     * Alias relasi dalam bahasa Inggris (roles).
     */
    public function roles(): BelongsToMany
    {
        return $this->peran();
    }
}
