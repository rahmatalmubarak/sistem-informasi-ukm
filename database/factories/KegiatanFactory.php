<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jenis = array(
            'rapat',
            'pelatihan',
            'acara'
        );
        return [
            'ormawa_id' => random_int(1,4),
            'nama' => fake()->jobTitle(),
            'penanggung_jawab' => fake()->name(),
            'jenis' => $jenis[array_rand($jenis)],
            'tgl_mulai' => fake()->date(),
            'tgl_selesai' => fake()->date(),
            'tempat' => fake()->address()
        ];
    }
}
