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
            'password' => Hash::make('password123'),
            'username' => 'admin1',
            'profile_photo_path' => 'https://www.kindpng.com/picc/m/421-4212275_transparent-default-avatar-png-avatar-img-png-download.png',
            'role' => 'admin'
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Two',
            'email' => 'admin2@admin.com',
            'password' => Hash::make('password123'),
            'username' => 'admin2',
            'profile_photo_path' => 'https://www.kindpng.com/picc/m/421-4212275_transparent-default-avatar-png-avatar-img-png-download.png',
            'role' => 'admin'
        ]);

        User::factory(20)->create();
    }
}
