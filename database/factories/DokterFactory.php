<?php

namespace Database\Factories;

use App\Models\Dokter;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dokter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokter' => $this->faker->name(),
            'slug_dokter' => Str::slug($this->faker->name()),
        ];
    }
}
