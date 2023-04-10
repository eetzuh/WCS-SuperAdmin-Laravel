<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name'=>'superadmin',
            'email'=>'superadmin@mailinator.com',
            'super_admin'=>true,
            'password'=>bcrypt('12345678'),
        ]);
    }
}
