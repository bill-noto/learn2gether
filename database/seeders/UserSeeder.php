<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'One',
            'email' => 'admin1@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'username' => 'admin1',
            'profile_photo_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTk5wU7AMQXCYGVsvB7ZX6FQImOSGPaBgSNmg&usqp=CAU',
            'role' => 'admin'
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Two',
            'email' => 'admin2@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'username' => 'admin2',
            'profile_photo_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTk5wU7AMQXCYGVsvB7ZX6FQImOSGPaBgSNmg&usqp=CAU',
            'role' => 'admin'
        ]);

        User::factory(20)->create();
    }
}
