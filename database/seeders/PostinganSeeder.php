<?php

namespace Database\Seeders;

use App\Models\Postingan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengumuman_list = [
            [
                'ormawa_id' => 1,
                'judul' => 'Open Recruitment Ormawa DEMA FST',
                'gambar' => '',
                'headline' => '',
                'content' => '',
                'kategori' => 'pengumuman',
                'tgl_post' =>  now()
            ],
            [
                'ormawa_id' => 2,
                'judul' => 'Open Recruitment Ormawa SEMA FST',
                'gambar' => '',
                'headline' => '',
                'content' => '',
                'kategori' => 'pengumuman',
                'tgl_post' =>  now()
            ],
            [
                'ormawa_id' => 3,
                'judul' => 'Open Recruitment Ormawa HMPS MTK',
                'gambar' => '',
                'headline' => '',
                'content' => '',
                'kategori' => 'pengumuman',
                'tgl_post' =>  now()
            ],
            [
                'ormawa_id' => 4,
                'judul' => 'Open Recruitment Ormawa HMPS SI',
                'gambar' => '',
                'headline' => '',
                'content' => '',
                'kategori' => 'pengumuman',
                'tgl_post' =>  now()
            ]
        ];
        foreach ($pengumuman_list as $key => $pengumuman) {
            if($data = Postingan::where('kategori', 'pengumuman')->where('ormawa_id', $pengumuman['ormawa_id'])->first()){
                $data->update($pengumuman);
            }else{
                Postingan::create($pengumuman);
            }
        }
        Postingan::factory()->count(11)->create();

        
    }
}
