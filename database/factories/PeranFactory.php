<?php

namespace Database\Factories;

use App\Models\Peran;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Peran>
 */
class PeranFactory extends Factory
{
    /**
     * Nama model yang sesuai dengan factory ini.
     *
     * @var class-string<Peran>
     */
    protected $model = Peran::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->word();

        return [
            'nama' => ucfirst($name),
            'slug' => Str::slug($name),
            'deskripsi' => fake()->sentence(),
        ];
    }
}
