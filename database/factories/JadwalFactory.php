<?php

namespace Database\Factories;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jadwal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 1	1	1	Pagi	08:00:00	16:00:00	08:00 - 16:00 - Pagi	2021-08-12 13:25:55	2021-08-12 13:25:55
        return [
            'poli_id' => '1',
            'dokter_id' => '1',
            'shift' => 'Pagi',
            'dari' => '08:00:00',
            'sampai' => '16:00:00',
            'slug' => '08:00 - 16:00 - Pagi',
        ];
    }
}
