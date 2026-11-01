<?php

namespace Database\Factories;

use App\Models\HakAkses;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<HakAkses>
 */
class HakAksesFactory extends Factory
{
    /**
     * Nama model yang sesuai dengan factory ini.
     *
     * @var class-string<HakAkses>
     */
    protected $model = HakAkses::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'nama' => ucfirst($name),
            'slug' => Str::slug($name),
            'deskripsi' => fake()->sentence(),
        ];
    }
}
