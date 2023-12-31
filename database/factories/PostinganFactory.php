<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostinganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kategori = array(
            "berita",
            "agenda"
        );

        return [
            'ormawa_id' => random_int(1,4),
            'judul' => fake()->jobTitle(),
            'headline' => substr(fake()->jobTitle(), 100),
            'content' => fake()->realText(),
            'kategori' => $kategori[array_rand($kategori)],
            'tgl_post' =>  fake()->date()
        ];
    }
}
