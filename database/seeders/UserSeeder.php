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
            'role' => 'admin'
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Two',
            'email' => 'admin2@admin.com',
            'password' => Hash::make('password123'),
            'username' => 'admin2',
            'role' => 'admin'
        ]);

        User::factory(20)->create();
    }
}
