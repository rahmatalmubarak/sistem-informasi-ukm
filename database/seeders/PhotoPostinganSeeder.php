<?php

namespace Database\Seeders;

use App\Models\PhotoPostingan;
use App\Models\Postingan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoPostinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postingan_list = array(
            'postingan1',
            'postingan2',
            'postingan3',
            'postingan4',
        );

        $postingans = Postingan::all();

        foreach ($postingans as $key => $postingan) {
            for ($i=0; $i <= random_int(1,3) ; $i++) { 
                PhotoPostingan::create([
                    'postingan_id' => $postingan->id,
                    'gambar' =>  $postingan_list[$i].'.jpg',
                ]);
            }
        }
    }
}
