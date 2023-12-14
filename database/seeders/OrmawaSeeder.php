<?php

namespace Database\Seeders;

use App\Models\Ormawa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ormawas = [ 
            [
                'user_id' => 1,
                'nama' => 'DEMA FST',
                'logo' => 'dema.png',
                'deskripsi' => ''
            ],
            [
                'user_id' => 2,
                'nama' => 'SEMA FST',
                'logo' => 'sema.png',
                'deskripsi' => ''
            ],
            [
                'user_id' => 3,
                'nama' => 'HMPS MTK',
                'logo' => 'mtk.png',
                'deskripsi' => ''
            ],
            [
                'user_id' => 4,
                'nama' => 'HMPS MTK',
                'logo' => 'hmpsi.png',
                'deskripsi' => ''
            ],
        ];
        foreach ($ormawas as $key => $ormawa) {
            Ormawa::create($ormawa);
        }
    }
}
