<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            0 =>[
                'id' => 1,
                'nama' => 'super admin',
            ],
            1 => [
                'id' => 2,
                'nama' => 'admin',
            ],
        ];
        foreach ($role as $key => $value) {
            $role = Role::where('id', $value['id'])
                ->first();

            if (isset($role)) {
                $role->update($value);
            } else {
                $role = Role::create($value);
            }
        }
    }
}
