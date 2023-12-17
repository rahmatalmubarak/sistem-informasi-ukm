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
                'nama' => 'DEMA FST',
                'logo' => 'dema.png',
                'deskripsi' => ''
            ],
            [
                'nama' => 'SEMA FST',
                'logo' => 'sema.png',
                'deskripsi' => ''
            ],
            [
                'nama' => 'HMPS MTK',
                'logo' => 'mtk.png',
                'deskripsi' => ''
            ],
            [
                'nama' => 'HMPS SI',
                'logo' => 'hmpsi.png',
                'deskripsi' => ''
            ],
        ];
        foreach ($ormawas as $key => $ormawa) {
            if($ormawa_ = Ormawa::where('nama', $ormawa['nama'])->first()){
                $ormawa_->update($ormawa);
            }else{
                Ormawa::create($ormawa);
            }
        }
    }
}
