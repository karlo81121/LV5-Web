<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'Admin',
            'name' => 'Karlo',
            'email' => 'adzic.karlo74@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789')
        ]);
    }
}
