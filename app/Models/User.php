<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke peran (roles) yang dimiliki oleh pengguna ini.
     */
    public function peran(): BelongsToMany
    {
        return $this->belongsToMany(
            Peran::class,
            'pengguna_peran',
            'pengguna_id',
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

    /**
     * Periksa apakah pengguna memiliki peran tertentu berdasarkan slug atau nama peran.
     *
     * @param  string|array<string>  $peran
     */
    public function hasRole(string|array $peran): bool
    {
        $peranList = (array) $peran;

        if ($this->relationLoaded('peran')) {
            return $this->peran->contains(function (Peran $p) use ($peranList): bool {
                return in_array($p->slug, $peranList, true) || in_array($p->nama, $peranList, true);
            });
        }

        try {
            return $this->peran()
                ->where(function ($query) use ($peranList): void {
                    $query->whereIn('slug', $peranList)
                        ->orWhereIn('nama', $peranList);
                })->exists();
        } catch (\Throwable) {
            return false;
        }
    }

    /**
     * Periksa apakah pengguna memiliki hak akses tertentu (melalui peran-perannya).
     */
    public function hasPermission(string $hakAkses): bool
    {
        try {
            $roles = $this->relationLoaded('peran') ? $this->peran : $this->peran()->with('hakAkses')->get();

            foreach ($roles as $role) {
                if ($role->memilikiHakAkses($hakAkses)) {
                    return true;
                }
            }
        } catch (\Throwable) {
            return false;
        }

        return false;
    }

    /**
     * Tetapkan peran ke pengguna.
     */
    public function assignRole(Peran|string $peran): void
    {
        if (is_string($peran)) {
            $peran = Peran::firstOrCreate(
                ['slug' => $peran],
                ['nama' => ucwords(str_replace('-', ' ', $peran))]
            );
        }

        $this->peran()->syncWithoutDetaching([$peran->id]);
    }

    /**
     * Cabut peran dari pengguna.
     */
    public function removeRole(Peran|string $peran): void
    {
        if (is_string($peran)) {
            $peran = Peran::where('slug', $peran)->first();
            if (! $peran) {
                return;
            }
        }

        $this->peran()->detach($peran->id);
    }
}
