<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftar>
 */
class PendaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kelas = array(
            'SI 20 A',
            'MTK 20 A',
            'SI 21 A',
            'SI 21 B',
            'MTK 21 A',
            'MTK 21 B',
        );

        $kepengurusan = array(
            'DEMA F Periode 2022-2023',
            'HMPS-SI Periode 2022-2023',
            'HMPS-MTK Periode 2022-2023',
        );

        return [
            'ormawa_id' => random_int(1,4),
            'nama' => fake()->name(),
            'email' => fake()->email(),
            'nim' => rand(0,99999999),
            'kontak' => fake()->phoneNumber(8),
            'kelas' => $kelas[array_rand($kelas)],
            'kepengurusan_sebelumnya' => $kepengurusan[array_rand($kepengurusan)],
            'tujuan' => fake()->userName(),
            'file_syarat' => fake()->userName(),
            'konfirmasi' => 0
        ];
    }
}
