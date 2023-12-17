<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();

        User::create([
            'username' => 'super.admin',
            'email' => 'super.admin@gmail.com',
            'password' => '$2y$10$eP13EuMKsSPNJ1xreyMu0u39BiwniDGg6dnGNVOjL/o/9s3DBC7Fi', // admin
            'role_id' => 1,
            'ormawa_id' => NULL
        ]);
    }
}
